<?php

namespace App\Entity;

use App\Repository\ScheduleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ScheduleRepository::class)
 */
class Schedule
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups({"schedule_show"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=8, nullable=true)
     * 
     * @Groups({"schedule_show"})
     */
    private $day;

    /**
     * @ORM\Column(type="time", nullable=true)
     * 
     * @Groups({"schedule_show"})
     * 
     */
    private $openMorning;

    /**
     * @ORM\Column(type="time", nullable=true)
     * 
     * @Groups({"schedule_show"})
     * 
     */
    private $closeMorning;

    /**
     * @ORM\Column(type="time", nullable=true)
     * 
     * @Groups({"schedule_show"})
     */
    private $openAfternoon;

    /**
     * @ORM\Column(type="time", nullable=true)
     * 
     * @Groups({"schedule_show"})
     */
    private $closeAfternoon;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Bakery::class, inversedBy="schedule")
<<<<<<< HEAD
=======
     * 
>>>>>>> api
     */
    private $bakery;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(?string $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getOpenMorning(): ?\DateTimeInterface
    {
        return $this->openMorning;
    }

    public function setOpenMorning(?\DateTimeInterface $openMorning): self
    {
        $this->openMorning = $openMorning;

        return $this;
    }

    public function getCloseMorning(): ?\DateTimeInterface
    {
        return $this->closeMorning;
    }

    public function setCloseMorning(?\DateTimeInterface $closeMorning): self
    {
        $this->closeMorning = $closeMorning;

        return $this;
    }

    public function getOpenAfternoon(): ?\DateTimeInterface
    {
        return $this->openAfternoon;
    }

    public function setOpenAfternoon(?\DateTimeInterface $openAfternoon): self
    {
        $this->openAfternoon = $openAfternoon;

        return $this;
    }

    public function getCloseAfternoon(): ?\DateTimeInterface
    {
        return $this->closeAfternoon;
    }

    public function setCloseAfternoon(?\DateTimeInterface $closeAfternoon): self
    {
        $this->closeAfternoon = $closeAfternoon;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getBakery(): ?Bakery
    {
        return $this->bakery;
    }

    public function setBakery(?Bakery $bakery): self
    {
        $this->bakery = $bakery;

        return $this;
    }
}