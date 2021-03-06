<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="planification_period", uniqueConstraints={@ORM\UniqueConstraint(name="uk_planification_period",columns={"planification_id", "beginning_date"})})
 * @ORM\Entity(repositoryClass="App\Repository\PlanificationPeriodRepository")
 * @ORM\HasLifecycleCallbacks()
 */

class PlanificationPeriod
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $beginningDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $endDate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Planification", inversedBy="planificationPeriods")
     * @ORM\JoinColumn(nullable=false)
     */
    private $planification;

    /**
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlanificationLine", mappedBy="planificationPeriod", orphanRemoval=true)
     */
    private $planificationLines;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlanificationResource", mappedBy="planificationPeriod", orphanRemoval=true)
     */
    private $planificationResources;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="planificationPeriods")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BookingLine", mappedBy="planificationPeriod")
     */
    private $bookingLines;

    public function __construct(\App\Entity\User $user, \App\Entity\Planification $planification)
    {
        $this->setUser($user);
        $this->setPlanification($planification);
        $this->planificationLines = new ArrayCollection();
        $this->planificationResources = new ArrayCollection();
        $this->bookingLines = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getBeginningDate(): ?\DateTimeInterface
    {
        return $this->beginningDate;
    }

    public function setBeginningDate(?\DateTimeInterface $beginningDate): self
    {
        $this->beginningDate = $beginningDate;
        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;
        return $this;
    }

    public function setEndDateToNull(): self
    {
        $this->endDate = null;
        return $this;
    }

    public function isEndDateNull(): ?bool
    {
        return ($this->endDate == null);
    }

    // Date de fin de planification affichée dans le planning. Elle est affichée que si elle n'est pas nulle mais dans le fichier planning/modal.html.twig, la date transmise ne doit être jamais nulle même apparamment si la fonction n'est pas appelée.
    public function getPlanningEndDate(): ?\DateTimeInterface
    {
        if (!$this->isEndDateNull()) {
            return $this->endDate;
        } else {
            return (new \DateTime());
        }
    }

    public function getPlanification(): ?Planification
    {
        return $this->planification;
    }

    public function setPlanification(?Planification $planification): self
    {
        $this->planification = $planification;

        return $this;
    }

    /**
    * @ORM\PrePersist
    */
    public function createDate()
    {
        $this->createdAt = new \DateTime();
    }

    /**
    * @ORM\PreUpdate
    */
    public function updateDate()
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * @return Collection|PlanificationLine[]
     */
    public function getPlanificationLines(): Collection
    {
        return $this->planificationLines;
    }

    public function addPlanificationLine(PlanificationLine $planificationLine): self
    {
        if (!$this->planificationLines->contains($planificationLine)) {
            $this->planificationLines[] = $planificationLine;
            $planificationLine->setPlanificationPeriod($this);
        }

        return $this;
    }

    public function removePlanificationLine(PlanificationLine $planificationLine): self
    {
        if ($this->planificationLines->contains($planificationLine)) {
            $this->planificationLines->removeElement($planificationLine);
            // set the owning side to null (unless already changed)
            if ($planificationLine->getPlanificationPeriod() === $this) {
                $planificationLine->setPlanificationPeriod(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|PlanificationResource[]
     */
    public function getPlanificationResources(): Collection
    {
        return $this->planificationResources;
    }

    public function addPlanificationResource(PlanificationResource $planificationResource): self
    {
        if (!$this->planificationResources->contains($planificationResource)) {
            $this->planificationResources[] = $planificationResource;
            $planificationResource->setPlanificationPeriod($this);
        }

        return $this;
    }

    public function removePlanificationResource(PlanificationResource $planificationResource): self
    {
        if ($this->planificationResources->contains($planificationResource)) {
            $this->planificationResources->removeElement($planificationResource);
            // set the owning side to null (unless already changed)
            if ($planificationResource->getPlanificationPeriod() === $this) {
                $planificationResource->setPlanificationPeriod(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|BookingLine[]
     */
    public function getBookingLines(): Collection
    {
        return $this->bookingLines;
    }

    public function addBookingLine(BookingLine $bookingLine): self
    {
        if (!$this->bookingLines->contains($bookingLine)) {
            $this->bookingLines[] = $bookingLine;
            $bookingLine->setPlanificationPeriod($this);
        }

        return $this;
    }

    public function removeBookingLine(BookingLine $bookingLine): self
    {
        if ($this->bookingLines->contains($bookingLine)) {
            $this->bookingLines->removeElement($bookingLine);
            // set the owning side to null (unless already changed)
            if ($bookingLine->getPlanificationPeriod() === $this) {
                $bookingLine->setPlanificationPeriod(null);
            }
        }

        return $this;
    }
}
