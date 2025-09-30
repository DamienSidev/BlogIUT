<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use IntlDateFormatter;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["article_datatable"])]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: false)]
    #[Assert\NotBlank(['message' => "Le titre ne peut pas être vide"])]
    #[Groups(["article_datatable"])]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(["article_datatable"])]
    private ?string $content = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Author $author = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    #[Groups(["article_datatable"])]
    public function getCreatedAtFormatted(): ?string
    {
        $fmt = new IntlDateFormatter('fr_FR', IntlDateFormatter::MEDIUM, IntlDateFormatter::SHORT);
        return $fmt->format($this->createdAt);
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    #[Groups(["article_datatable"])]
    public function getUpdatedAtFormatted(): ?string
    {
        if ($this->updatedAt === null) {
            return "---";
        }
        $fmt = new IntlDateFormatter('fr_FR', IntlDateFormatter::MEDIUM, IntlDateFormatter::SHORT);
        return $fmt->format($this->updatedAt);
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author): static
    {
        $this->author = $author;

        return $this;
    }
}
