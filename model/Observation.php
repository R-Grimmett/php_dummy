<?php
declare(strict_types=1);

require "Tag.php";

class Observation
{
    private $id;
    private $name;
    private $data;
    private $tags;


    public function __construct(int $id, string $name, string $data, array $tags)
    {
        $this->id = $id;
        $this->name = $name;
        $this->data = $data;
        if (empty($tags)) {
            $this->tags = [];
        } else {
            $this->tags = $tags;
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Adds a new tag to an observation if it is not already within the observation's $tags array.
     * @param Tag $tag The tag to add to the observation.
     * @return void
     */
    public function addTag(Tag $tag): void
    {
        if (count($this->tags) > 0) {
            for ($i = 0; $i < count($this->tags); $i++) {
                if ($this->tags[$i] === $tag) {
                    return;
                }
            }
            array_push($this->tags, $tag);
        } else {
            array_push($this->tags, $tag);
        }
    }

    private function renderTags(): string
    {
        $return_string = '';
        foreach ($this->tags as $tag) {
            $return_string .= $tag->render();
        }
        return $return_string;
    }

    /**
     * Renders the observation on the webpage by echo-ing it.
     */
    public function render(): void
    {
        echo '<div class="card mb-3"><div class="row g-2"><div class="card-body col-8"><h5 class="card-title">'
            . $this->id . ' | ' . $this->name . '</h5><p class="card-text">' . $this->data .
            '</p></div><div class="card-body col-4"><div class="row mb-3"><h5 class="card-subtitle">Themes</h5></div>' .
            '<div class="row mb-3"><h5 class="card-subtitle">Tags</h5>' . $this->renderTags() . '</h5></div></div></div></div>';
    }

    public function store(): array
    {
        $parameters = [
            'id' => $this->id,
            'name' => $this->name,
            'data' => $this->data,
            'tags' => $this->tags
        ];
        return $parameters;
    }
}
