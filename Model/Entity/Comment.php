<?php


namespace Model\Entity;


class Comment {
    private ?int $id;
    private string $content;
    private User $user;
    private Article $article;


    /**
     * Comment constructor.
     * @param string $content
     * @param User $user
     * @param int|null $id
     * @param Article $article
     */
    public function __construct(string $content, User $user, int $id= null, Article $article) {
        $this->content = $content;
        $this->id = $id;
        $this->user = $user;
        $this->article = $article;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return Article
     */
    public function getArticle(): Article
    {
        return $this->article;
    }

    /**
     * @param Article $article
     */
    public function setArticle(Article $article): void
    {
        $this->article = $article;
    }

}