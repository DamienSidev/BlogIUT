<?php

namespace App\Command;

use App\Entity\Article;
use App\Kernel;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

#[AsCommand(
    name: 'z:init',
    description: 'Une commande pour insérer des données dans la DB',
)]
class InitCommand extends Command
{
    public function __construct(private readonly KernelInterface $kernel, private readonly EntityManagerInterface $em)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $projectDir = $this->kernel->getProjectDir();
        $filename = $projectDir . "/import/datas.csv";
        $datas = $this->decode($filename);
        $io->progressStart(count($datas));
        foreach ($datas as $data) {
            $artcile = new Article();
            foreach ($data as $key => $value) {
                switch ($key) {
                    case 'Title':
                        $artcile->setTitle($value);
                        break;
                    case 'Content':
                        $artcile->setContent($value);
                        break;
                    case 'UpdatedAt':
                        if ($value !== "") {
                            $artcile->setUpdatedAt(\DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $value));
                        }
                        break;
                    case 'CreatedAt':
                        $artcile->setCreatedAt(\DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $value));
                        break;
                    default :
                        dd($key, $value);
                }
            }
            $this->em->persist($artcile);
//            $this->em->flush();
            $io->progressAdvance();
        }
        $io->progressFinish();
        $this->em->flush();

        $io->success('Commande executée avec succès');

        return Command::SUCCESS;
    }

    private function decode(string $filename)
    {
        $csv = file_get_contents($filename);
        $encoders = [new CsvEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        return $serializer->decode($csv, 'csv', [
            CsvEncoder::DELIMITER_KEY => ';'
        ]);
    }
}
