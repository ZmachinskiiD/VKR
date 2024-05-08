<?php
namespace Up\Models;
class Comment
{
    private int $id;
    private int $userId;
    private int $buildingId;
    private string $text;
    private string $userName;

    /**
     * @param int $id
     * @param int $userId
     * @param int $buildingId
     * @param string $text
     */
    public function __construct(int $id, int $userId, int $buildingId, string $text,string $userName)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->buildingId = $buildingId;
        $this->text = $text;
        $this->userName=$userName;
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function setUserName(int $userName): void
    {
        $this->userName = $userName;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getBuildingId(): int
    {
        return $this->buildingId;
    }

    public function setBuildingId(int $buildingId): void
    {
        $this->buildingId = $buildingId;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }
}