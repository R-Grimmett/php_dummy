<?php
declare(strict_types=1);

class Tag
{
    private $tag_id;
    private $group_id;
    private $name;

    public function __construct(int $tag_id, int $group_id, string $name)
    {
        $this->tag_id = $tag_id;
        $this->group_id = $group_id;
        $this->name = $name;
    }

    public function getTagId(): int
    {
        return $this->tag_id;
    }

    public function getGroupId(): int
    {
        return $this->group_id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function render(): void
    {
        echo '<div class="col"><button type="button" class="btn btn-info">' . $this->name . '</button></div>';
    }
}