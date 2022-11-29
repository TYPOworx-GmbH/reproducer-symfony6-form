<?php
namespace App\Entity;

use App\Entity\User;
use App\Validator\Telephone;
use Symfony\Component\Validator\Constraints as Assert;

class Address
{
    public const TYPE_PERSON = 'person';
    public const TYPE_COMPANY = 'company';
    //public const TYPE_DELIVERY = 'delivery';
    public const TYPE_TERMINAL = 'terminal';

    private ?int $id = null;

    private bool $enabled = false;

    #[Assert\NotBlank]
    private ?string $type = self::TYPE_PERSON;

    private ?string $commonName = null;

    private ?string $firstname = null;

    private ?string $lastname = null;

    private ?string $company = null;

    #[Assert\NotBlank]
    private ?string $street = '';

    #[Assert\NotBlank]
    private ?string $number = '';

    #[Assert\NotBlank]
    private ?string $zip = '';

    #[Assert\NotBlank]
    private ?string $city = '';

    #[Assert\Email]
    private ?string $email = null;

    private ?string $phone = null;


    public function __construct(string $type = self::TYPE_PERSON)
    {
        $this->setType($type);
    }

    public static function getTypes() : array
    {
        return [
            'Person'        => self::TYPE_PERSON,
            'Firma'         => self::TYPE_COMPANY,
            //'Lieferadresse' => self::TYPE_DELIVERY,
            'Terminal'      => self::TYPE_TERMINAL
        ];
    }

    public static function getNamedType(string $type = null) :? string
    {
        return array_flip(self::getTypes())[ $type ] ?? null;
    }

    public function getId() : ?int
    {
        return $this->id;
    }

    public function hasType(?string $type) : bool
    {
        return !empty($type) && defined(self::class . '::TYPE_' . strtoupper($type));
    }

    public function getType() : ?string
    {
        return $this->type;
    }

    public function setType(?string $type) : void
    {
        if(!$this->hasType($type)) { return; }

        $this->type = $type;
    }

    public function getFirstname() : ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname) : self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname() : ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname) : self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getCompany() : ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company) : self
    {
        $this->company = $company;

        return $this;
    }

    public function getStreet() : ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street) : self
    {
        $this->street = $street;

        return $this;
    }

    public function getNumber() : ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number) : self
    {
        $this->number = $number;

        return $this;
    }

    public function getZip() : ?string
    {
        return $this->zip;
    }

    public function setZip(?string $zip) : self
    {
        $this->zip = $zip;

        return $this;
    }

    public function getCity() : ?string
    {
        return $this->city;
    }

    public function setCity(?string $city) : self
    {
        $this->city = $city;

        return $this;
    }

    public function getEmail() : ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email) : self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone() : ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone) : self
    {
        $this->phone = $phone;

        return $this;
    }
}
