<?php

class Livre
{
    private int $id;
    private string $titre;
    private string $image;
    private int $nbPages;
    private string $resume;
    private string $uploader;
    // public static array $livres;

    public function __construct(int $id, string $titre, string $image, int $nbPages, string $resume = "", string $uploader = "")
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->image = $image;
        $this->nbPages = $nbPages;
        $this->resume = $resume;
        $this->uploader = $uploader;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of titre
     *
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @param string $titre
     *
     * @return self
     */
    public function setTitre(string $titre): self
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * Get the value of image
     *
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @param string $image
     *
     * @return self
     */
    public function setImage(string $image): self
    {
        $this->image = $image;
        return $this;
    }

    /**
     * Get the value of nbPages
     *
     * @return int
     */
    public function getNbPages(): int
    {
        return $this->nbPages;
    }

    /**
     * Set the value of nbPages
     *
     * @param int $nbPages
     *
     * @return self
     */
    public function setNbPages(int $nbPages): self
    {
        $this->nbPages = $nbPages;
        return $this;
    }

    /**
     * Get the value of uploader
     *
     * @return string
     */
    public function getUploader(): string
    {
        return $this->uploader;
    }

    /**
     * Get the value of resume
     *
     * @return string
     */
    public function getResume(): string
    {
        return $this->resume;
    }

    /**
     * Set the value of resume
     *
     * @param string $resume
     *
     * @return self
     */
    public function setResume(string $resume): self {
        $this->resume = $resume;
        return $this;
    }

    /**
     * Set the value of uploader
     *
     * @param string $uploader
     *
     * @return self
     */
    public function setUploader(string $uploader): self {
        $this->uploader = $uploader;
        return $this;
    }
}
