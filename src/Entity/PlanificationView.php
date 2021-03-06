<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="planification_view", uniqueConstraints={@ORM\UniqueConstraint(name="uk_planification_view",columns={"planification_period_id", "user_file_group_id"})})
 * @ORM\Entity(repositoryClass="App\Repository\PlanificationViewRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class PlanificationView
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PlanificationPeriod", inversedBy="planificationViews")
     * @ORM\JoinColumn(nullable=false)
     */
    private $planificationPeriod;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserFileGroup", inversedBy="planificationViews")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userFileGroup;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="integer")
     */
    private $oorder;

    /**
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlanificationViewResource", mappedBy="planificationView", orphanRemoval=true)
     */
    private $planificationViewResources;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlanificationPeriod(): ?PlanificationPeriod
    {
        return $this->planificationPeriod;
    }

    public function setPlanificationPeriod(?PlanificationPeriod $planificationPeriod): self
    {
        $this->planificationPeriod = $planificationPeriod;
        return $this;
    }

    public function getUserFileGroup(): ?UserFileGroup
    {
        return $this->userFileGroup;
    }

    public function setUserFileGroup(?UserFileGroup $userFileGroup): self
    {
        $this->userFileGroup = $userFileGroup;
        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;
        return $this;
    }

    public function getOrder(): ?int
    {
        return $this->oorder;
    }

    public function setOrder(int $oorder): self
    {
        $this->oorder = $oorder;
        return $this;
    }

    public function __construct(\App\Entity\PlanificationPeriod $planificationPeriod, \App\Entity\UserFileGroup $userFileGroup)
    {
        $this->setPlanificationPeriod($planificationPeriod);
        $this->setUserFileGroup($userFileGroup);
        $this->setActive(true);
        $this->setOrder(1);
        $this->planificationViewResources = new ArrayCollection();
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
     * @return Collection|PlanificationViewResource[]
     */
    public function getPlanificationViewResources(): Collection
    {
        return $this->planificationViewResources;
    }

    public function addPlanificationViewResource(PlanificationViewResource $planificationViewResource): self
    {
        if (!$this->planificationViewResources->contains($planificationViewResource)) {
            $this->planificationViewResources[] = $planificationViewResource;
            $planificationViewResource->setPlanificationView($this);
        }

        return $this;
    }

    public function removePlanificationViewResource(PlanificationViewResource $planificationViewResource): self
    {
        if ($this->planificationViewResources->contains($planificationViewResource)) {
            $this->planificationViewResources->removeElement($planificationViewResource);
            // set the owning side to null (unless already changed)
            if ($planificationViewResource->getPlanificationView() === $this) {
                $planificationViewResource->setPlanificationView(null);
            }
        }

        return $this;
    }
}
