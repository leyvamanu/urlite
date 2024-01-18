<?php

namespace App\Entity;

use App\Repository\ShortURLRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: ShortURLRepository::class)]
class ShortURL
{
    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id;

    #[ORM\Column(length: 4000)]
    private ?string $originalUrl = null;

    #[ORM\Column(length: 255)]
    private ?string $shortCode = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt;

    #[ORM\Column]
    private ?int $usageCount = 0;

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function getOriginalUrl(): ?string
    {
        return $this->originalUrl;
    }

    public function setOriginalUrl(string $originalUrl): static
    {
        $this->originalUrl = $originalUrl;

        return $this;
    }

    public function getShortCode(): ?string
    {
        return $this->shortCode;
    }

    public function setShortCode(string $shortCode): static
    {
        $this->shortCode = $shortCode;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUsageCount(): ?int
    {
        return $this->usageCount;
    }

    public function setUsageCount(int $usageCount): static
    {
        $this->usageCount = $usageCount;

        return $this;
    }

    public function incrementUsageCount(): self
    {
        $this->usageCount++;

        return $this;
    }

    public function generateShortCode(): void
    {
        $uuid = Uuid::v4();
        $shortCode = $uuid->toBase58();
        $this->shortCode = $shortCode;
    }
}
