<?php
class Photo
{
    private int $id;
    private int $building_id;
    private string $path;

    public function getId(): int
    {
        return $this->id;
    }

    public function getBuildingId(): int
    {
        return $this->building_id;
    }

    public function getPath(): string
    {
        return $this->path;
    }

}