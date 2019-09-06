<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="user_file_group", uniqueConstraints={@ORM\UniqueConstraint(name="uk_user_file_group",columns={"file_id", "name"})})
 * @ORM\Entity(repositoryClass="App\Repository\UserFileGroupRepository")
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity(fields={"file", "name"}, errorPath="name", message="userFileGroup.already.exists")
 */
class UserFileGroup
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
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="userFileGroups")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\File", inversedBy="userFileGroups")
     * @ORM\JoinColumn(nullable=false)
     */
    private $file;

    /**
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Choice({"ALL", "MANUAL"})
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\UserFile", inversedBy="userFileGroups")
     */
    private $userFiles;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getFile(): ?File
    {
        return $this->file;
    }

    public function setFile(?File $file): self
    {
        $this->file = $file;
        return $this;
    }

    public function __construct(\App\Entity\User $user, \App\Entity\File $file, string $type)
      {
  		$this->setUser($user);
  		$this->setFile($file);
      $this->setType($type);
      $this->userFiles = new ArrayCollection();
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

      public function getType(): ?string
      {
          return $this->type;
      }

      public function setType(string $type): self
      {
          $this->type = $type;
          return $this;
      }

      /**
       * @return Collection|UserFile[]
       */
      public function getUserFile(): Collection
      {
          return $this->userFiles;
      }

      public function addUserFile(UserFile $userFile): self
      {
          if (!$this->userFiles->contains($userFile)) {
              $this->userFiles[] = $userFile;
          }

          return $this;
      }

      public function removeUserFile(UserFile $userFile): self
      {
          if ($this->userFiles->contains($userFile)) {
              $this->userFiles->removeElement($userFile);
          }

          return $this;
      }

      public function getUserFileCount(): ?int
      {
        return count($this->userFiles);
      }
}
