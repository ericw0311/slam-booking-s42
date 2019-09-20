<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="planification_view", uniqueConstraints={@ORM\UniqueConstraint(name="uk_planification_view",columns={"planification_id", "user_file_group_id"})})
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Planification", inversedBy="planificationViews")
     * @ORM\JoinColumn(nullable=false)
     */
    private $planification;

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

    public function getId(): ?int
    {
        return $this->id;
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

    public function getOorder(): ?int
    {
        return $this->oorder;
    }

    public function setOorder(int $oorder): self
    {
        $this->oorder = $oorder;
        return $this;
    }

    public function __construct(\App\Entity\Planification $planification, \App\Entity\UserFileGroup $userFileGroup)
    {
        $this->setPlanification($planification);
        $this->setUserFileGroup($userFileGroup);
        $this->setActive(true);
        $this->setOorder(1);
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
}
