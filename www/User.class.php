<?php
class User
{
    public int $id;
    public string $identifiant;
    private string $password;
    public bool $isValide;

    public function __construct(int $id, string $identifiant,string $password)
    {
        $this->id = $id;
        $this->identifiant = $identifiant;
        $this->password = $password;
        $this->isValide = false;
    }
    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }
    public function getIdentifiant(): string {
        return $this->identifiant;
    }
    public function setIdentifiant(string $identifiant): self {
        $this->identifiant = $identifiant;
        return $this;
    }
    public function getPassword(): string {
        return $this->password;
    }
    public function setPassword(string $password): self {
        $this->password = $password;
        return $this;
    }
    public function getIsValide(): bool {
        return $this->isValide;
    }
    public function setIsValide(bool $isValide): self {
        $this->isValide = $isValide;
        return $this;
    }
}