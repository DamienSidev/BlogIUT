<?php

namespace App\Command;

use App\Entity\Article;
use App\Entity\Author;
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
    name: 'z:update',
    description: 'Une commande pour insérer les nouvelles données dans la DB',
)]
class UpdateCommand extends Command
{
    public function __construct(private readonly KernelInterface $kernel, private readonly EntityManagerInterface $em)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $authors = [];
        $io = new SymfonyStyle($input, $output);
        $projectDir = $this->kernel->getProjectDir();
        $authors = $this->addAuthors($projectDir, $io);
        $this->addArticles($projectDir, $io, $authors);

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
            CsvEncoder::DELIMITER_KEY => ','
        ]);
    }

    private function addAuthors($projectDir, $io)
    {
        $filename = $projectDir . "/import/author.csv";
        $datas = $this->decode($filename);
        $io->progressStart(count($datas));
        foreach ($datas as $data) {
            $author = new Author();
            $authors[] = $author;
            foreach ($data as $key => $value) {
                switch ($key) {
                    case 'name':
                        $author->setName($value);
                        break;
                    case 'firstname':
                        $author->setFirstname($value);
                        break;
                    case 'email':
                        $author->setEmail($value);
                        break;
                    default :
                        dd($key, $value);
                }
            }
            $this->em->persist($author);
            $io->progressAdvance();
        }
        $io->progressFinish();
        $this->em->flush();
        return $authors;
    }

    private function addArticles(string $projectDir, SymfonyStyle $io, array $authors)
    {
        $filename = $projectDir . "/import/article.csv";
        $datas = $this->decode($filename);
        $io->progressStart(count($datas));
        foreach ($datas as $data) {
            $article = new Article();
            foreach ($data as $key => $value) {
                switch ($key) {
                    case 'title':
                        $article->setTitle($value);
                        break;
                    case 'content':
                        $article->setContent($value);
                        break;
                    case 'updated_at':
                        if ($value !== "") {
                            $article->setUpdatedAt(\DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $value));
                        }
                        break;
                    case 'created_at':
                        $article->setCreatedAt(\DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $value));
                        break;
                    default :
                        $this->donothing();
                }
            }
            match($article->getTitle()) {
                "Article 1" => $article->setAuthor($authors[0]),
                "Article 2" => $article->setAuthor($authors[1]),
                "Article 3" => $article->setAuthor($authors[2]),
            };
            $this->em->persist($article);
            $io->progressAdvance();
        }
        $io->progressFinish();

        $this->em->flush();
        return $authors;
    }

    private function donothing()
    {
    }
}
