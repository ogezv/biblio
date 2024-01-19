<?php

class Livre
{
    private int $id;
    private string $titre;
    private string $image;
    private int $nombrePages;
    // public static array $livres;

    public function __construct(int $id, string $titre, string $image, int $nombrePages)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->image = $image;
        $this->nombrePages = $nombrePages;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of titre
     *
     * @return string
     */
    public function getTitre(): string {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @param string $titre
     *
     * @return self
     */
    public function setTitre(string $titre): self {
        $this->titre = $titre;
        return $this;
    }

    /**
     * Get the value of image
     *
     * @return string
     */
    public function getImage(): string {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @param string $image
     *
     * @return self
     */
    public function setImage(string $image): self {
        $this->image = $image;
        return $this;
    }

    /**
     * Get the value of nombrePages
     *
     * @return int
     */
    public function getNombrePages(): int {
        return $this->nombrePages;
    }

    /**
     * Set the value of nombrePages
     *
     * @param int $nombrePages
     *
     * @return self
     */
    public function setNombrePages(int $nombrePages): self {
        $this->nombrePages = $nombrePages;
        return $this;
    }
}
