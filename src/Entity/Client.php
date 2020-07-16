<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $company_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $activity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contact_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contact_position;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=Joboffer::class, mappedBy="client")
     */
    private $joboffers;

    public function __construct()
    {
        $this->joboffers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyName(): ?string
    {
        return $this->company_name;
    }

    public function setCompanyName(?string $company_name): self
    {
        $this->company_name = $company_name;

        return $this;
    }

    public function getActivity(): ?string
    {
        return $this->activity;
    }

    public function setActivity(?string $activity): self
    {
        $this->activity = $activity;

        return $this;
    }

    public function getContactName(): ?string
    {
        return $this->contact_name;
    }

    public function setContactName(?string $contact_name): self
    {
        $this->contact_name = $contact_name;

        return $this;
    }

    public function getContactPosition(): ?string
    {
        return $this->contact_position;
    }

    public function setContactPosition(?string $contact_position): self
    {
        $this->contact_position = $contact_position;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|Joboffer[]
     */
    public function getJoboffers(): Collection
    {
        return $this->joboffers;
    }

    public function addJoboffer(Joboffer $joboffer): self
    {
        if (!$this->joboffers->contains($joboffer)) {
            $this->joboffers[] = $joboffer;
            $joboffer->setClient($this);
        }

        return $this;
    }

    public function removeJoboffer(Joboffer $joboffer): self
    {
        if ($this->joboffers->contains($joboffer)) {
            $this->joboffers->removeElement($joboffer);
            // set the owning side to null (unless already changed)
            if ($joboffer->getClient() === $this) {
                $joboffer->setClient(null);
            }
        }

        return $this;
    }
}
