<?php

namespace App\Entity;

use App\Repository\SectorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectorRepository::class)
 */
class Sector
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Joboffer::class, mappedBy="sector")
     */
    private $joboffers;

    /**
     * @ORM\OneToMany(targetEntity=Candidate::class, mappedBy="sector")
     */
    private $candidates;

    public function __construct()
    {
        $this->joboffers = new ArrayCollection();
        $this->candidates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
            $joboffer->setSector($this);
        }

        return $this;
    }

    public function removeJoboffer(Joboffer $joboffer): self
    {
        if ($this->joboffers->contains($joboffer)) {
            $this->joboffers->removeElement($joboffer);
            // set the owning side to null (unless already changed)
            if ($joboffer->getSector() === $this) {
                $joboffer->setSector(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Candidate[]
     */
    public function getCandidates(): Collection
    {
        return $this->candidates;
    }

    public function addCandidate(Candidate $candidate): self
    {
        if (!$this->candidates->contains($candidate)) {
            $this->candidates[] = $candidate;
            $candidate->setSector($this);
        }

        return $this;
    }

    public function removeCandidate(Candidate $candidate): self
    {
        if ($this->candidates->contains($candidate)) {
            $this->candidates->removeElement($candidate);
            // set the owning side to null (unless already changed)
            if ($candidate->getSector() === $this) {
                $candidate->setSector(null);
            }
        }

        return $this;
    }
}
