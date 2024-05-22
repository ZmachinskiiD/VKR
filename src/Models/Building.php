<?php
namespace Up\Models;
class Building{
    private ?int $id;
    private string $rus_title;
    private ?string $deu_title;
    private int $yearOfBuild;
    private ?int $author_id;
    private ?string $description;
    private ?string $adress;
    private bool $doesExist;
    private ?string $Logopath;
    private ?string $geolocation;
    public function __construct(
        ?int $id,string $rus_title,?string $deu_title=null,?int $yearOfBuild=null, ?bool $doesExist=null,
        ?int $author_id=null,?string $description=null,?string $Logopath=null,?string $geolocation=null,?string $adress=null
    )
    {
        $this->id=$id??null;
        $this->rus_title=$rus_title;
        $this->deu_title=$deu_title??null;
        $this->yearOfBuild=$yearOfBuild??1;
        $this->doesExist=$doesExist??false;
        $this->author_id=$author_id??1;
        $this->description=$description??null;
        $this->Logopath=$Logopath??'1.png';
        $this->geolocation=$geolocation??"djjdjdjdjdj";
        $this->adress=$adress??"hhhhh";
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function getRusTitle(): string
    {
        return $this->rus_title;
    }

    public function getDeuTitle(): mixed
    {
        return $this->deu_title;
    }

    public function getYearOfBuild(): int
    {
        return $this->yearOfBuild;
    }

    public function getAuthorId(): int
    {
        return $this->author_id;
    }

    public function getDescription(): mixed
    {
        return $this->description;
    }

    public function getAdress(): string
    {
        return $this->adress;
    }

    public function isDoesExist(): bool
    {
        return $this->doesExist;
    }

    public function getLogopath(): string
    {
        return $this->Logopath;
    }

    public function getGeolocation(): string
    {
        return $this->geolocation;
    }


}