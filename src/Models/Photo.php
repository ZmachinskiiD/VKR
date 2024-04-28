<?php
namespace Up\Models;
class Photo
{
    private int $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getBuildingId(): ?int
    {
        return $this->building_id;
    }

    public function setBuildingId(?int $building_id): void
    {
        $this->building_id = $building_id;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    private ?int $building_id;
    private string $path;
    private string $description;
    public function __construct($id,$building_id,$path,$description)
    {
        $this->id=$id;
        $this->building_id=$building_id;
        $this->path=$path;
        $this->description=$description;
    }




}