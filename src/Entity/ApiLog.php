<?php

namespace App\Entity;

use App\Repository\ApiLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApiLogRepository::class)]
class ApiLog
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $resource = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $endpoint = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $requestType = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $request = null;

    #[ORM\Column]
    private ?int $requestLength = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $response = null;

    #[ORM\Column]
    private ?int $responseCode = null;

    #[ORM\Column]
    private ?int $responseLength = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $responseId = null;

    #[ORM\Column]
    private ?int $duration = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $errorMessage = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $created = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updated = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResource(): ?string
    {
        return $this->resource;
    }

    public function setResource(string $resource): self
    {
        $this->resource = $resource;

        return $this;
    }

    public function getEndpoint(): ?string
    {
        return $this->endpoint;
    }

    public function setEndpoint(string $endpoint): self
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    public function getRequestType(): ?string
    {
        return $this->requestType;
    }

    public function setRequestType(?string $requestType): self
    {
        $this->requestType = $requestType;

        return $this;
    }

    public function getRequest(): ?string
    {
        return $this->request;
    }

    public function setRequest(?string $request): self
    {
        $this->request = $request;

        return $this;
    }

    public function getRequestLength(): ?int
    {
        return $this->requestLength;
    }

    public function setRequestLength(int $requestLength): self
    {
        $this->requestLength = $requestLength;

        return $this;
    }

    public function getResponse(): ?string
    {
        return $this->response;
    }

    public function setResponse(?string $response): self
    {
        $this->response = $response;

        return $this;
    }

    public function getResponseCode(): ?int
    {
        return $this->responseCode;
    }

    public function setResponseCode(int $responseCode): self
    {
        $this->responseCode = $responseCode;

        return $this;
    }

    public function getResponseLength(): ?int
    {
        return $this->responseLength;
    }

    public function setResponseLength(int $responseLength): self
    {
        $this->responseLength = $responseLength;

        return $this;
    }

    public function getResponseId(): ?string
    {
        return $this->responseId;
    }

    public function setResponseId(?string $responseId): self
    {
        $this->responseId = $responseId;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public function setErrorMessage(?string $errorMessage): self
    {
        $this->errorMessage = $errorMessage;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(?\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

        return $this;
    }

}
