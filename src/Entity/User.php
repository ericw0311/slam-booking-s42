<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="user")
 * @UniqueEntity(fields="email", message="Email déjà pris")
 * @UniqueEntity(fields="userName", message="Username déjà pris")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="user_name", type="string", length=255, unique=true)
     * @Assert\NotBlank()
     */
    private $userName;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
      * @ORM\Column(name="account_type", type="string", length=255)
      */
    private $accountType = "INDIVIDUAL";

    /**
      * @ORM\Column(name="first_name", type="string", length=255)
      * @Assert\NotBlank()
    */
    private $firstName;

    /**
      * @ORM\Column(name="last_name", type="string", length=255)
      * @Assert\NotBlank()
    */
    private $lastName;

    /**
     * @ORM\Column(name="unique_name", type="string", length=255, nullable=true)
    */
    private $uniqueName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getAccountType(): ?string
    {
        return $this->accountType;
    }

    public function setAccountType(string $accountType): self
    {
        $this->accountType = $accountType;
        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getUniqueName(): ?string
    {
        return $this->uniqueName;
    }

    public function setUniqueName(?string $uniqueName): self
    {
        $this->uniqueName = $uniqueName;
        return $this;
    }

    public function getFirstAndLastName()
    {
        return $this->getFirstName().' '.$this->getLastName();
    }

    /**
    * @Assert\IsTrue(message="user.organisation.name.null")
    */
    public function isUniqueName()
    {
        return ($this->getAccountType() != 'ORGANISATION' or $this->getUniqueName() !== null);
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    private $__EXTRA__LINE;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\File", mappedBy="user", orphanRemoval=true)
     */
    private $files;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserFile", mappedBy="user", orphanRemoval=true)
     */
    private $userFiles;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserParameter", mappedBy="user", orphanRemoval=true)
     */
    private $userParameters;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Timetable", mappedBy="user", orphanRemoval=true)
     */
    private $timetables;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TimetableLine", mappedBy="user", orphanRemoval=true)
     */
    private $timetableLines;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ResourceClassification", mappedBy="user", orphanRemoval=true)
     */
    private $resourceClassifications;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Resource", mappedBy="user", orphanRemoval=true)
     */
    private $resources;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Planification", mappedBy="user", orphanRemoval=true)
     */
    private $planifications;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Label", mappedBy="user", orphanRemoval=true)
     */
    private $labels;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlanificationPeriod", mappedBy="user", orphanRemoval=true)
     */
    private $planificationPeriods;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlanificationResource", mappedBy="user", orphanRemoval=true)
     */
    private $planificationResources;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PlanificationLine", mappedBy="user", orphanRemoval=true)
     */
    private $planificationLines;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Booking", mappedBy="user")
     */
    private $bookings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BookingUser", mappedBy="user")
     */
    private $bookingUsers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BookingLine", mappedBy="user")
     */
    private $bookingLines;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BookingLabel", mappedBy="user")
     */
    private $bookingLabels;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\QueryBooking", mappedBy="user", orphanRemoval=true)
     */
    private $queryBookings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FileParameter", mappedBy="user", orphanRemoval=true)
     */
    private $fileParameters;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BookingDuplication", mappedBy="user", orphanRemoval=true)
     */
    private $bookingDuplications;

    /**
     * @return Collection|File[]
     */
    public function getFiles(): Collection
    {
        return $this->files;
    }

    public function addFile(File $file): self
    {
        if (!$this->files->contains($file)) {
            $this->files[] = $file;
            $file->setUser($this);
        }
        $__EXTRA__LINE;
        return $this;
    }

    public function removeFile(File $file): self
    {
        if ($this->files->contains($file)) {
            $this->files->removeElement($file);
            // set the owning side to null (unless already changed)
            if ($file->getUser() === $this) {
                $file->setUser(null);
            }
        }
        $__EXTRA__LINE;
        return $this;
    }

    /**
     * @return Collection|UserFile[]
     */
    public function getUserFiles(): Collection
    {
        return $this->userFiles;
    }

    public function addUserFile(UserFile $userFile): self
    {
        if (!$this->userFiles->contains($userFile)) {
            $this->userFiles[] = $userFile;
            $userFile->setUser($this);
        }
        $__EXTRA__LINE;
        return $this;
    }

    public function removeUserFile(UserFile $userFile): self
    {
        if ($this->userFiles->contains($userFile)) {
            $this->userFiles->removeElement($userFile);
            // set the owning side to null (unless already changed)
            if ($userFile->getUser() === $this) {
                $userFile->setUser(null);
            }
        }
        $__EXTRA__LINE;
        return $this;
    }

    /**
     * @return Collection|UserParameter[]
     */
    public function getUserParameters(): Collection
    {
        return $this->userParameters;
    }

    public function addUserParameter(UserParameter $userParameter): self
    {
        if (!$this->userParameters->contains($userParameter)) {
            $this->userParameters[] = $userParameter;
            $userParameter->setUser($this);
        }
        $__EXTRA__LINE;
        return $this;
    }

    public function removeUserParameter(UserParameter $userParameter): self
    {
        if ($this->userParameters->contains($userParameter)) {
            $this->userParameters->removeElement($userParameter);
            // set the owning side to null (unless already changed)
            if ($userParameter->getUser() === $this) {
                $userParameter->setUser(null);
            }
        }
        $__EXTRA__LINE;
        return $this;
    }

    /**
     * @return Collection|Timetable[]
     */
    public function getTimetables(): Collection
    {
        return $this->timetables;
    }

    public function addTimetable(Timetable $timetable): self
    {
        if (!$this->timetables->contains($timetable)) {
            $this->timetables[] = $timetable;
            $timetable->setUser($this);
        }
        $__EXTRA__LINE;
        return $this;
    }

    public function removeTimetable(Timetable $timetable): self
    {
        if ($this->timetables->contains($timetable)) {
            $this->timetables->removeElement($timetable);
            // set the owning side to null (unless already changed)
            if ($timetable->getUser() === $this) {
                $timetable->setUser(null);
            }
        }
        $__EXTRA__LINE;
        return $this;
    }

    /**
     * @return Collection|TimetableLine[]
     */
    public function getTimetableLines(): Collection
    {
        return $this->timetableLines;
    }

    public function addTimetableLine(TimetableLine $timetableLine): self
    {
        if (!$this->timetableLines->contains($timetableLine)) {
            $this->timetableLines[] = $timetableLine;
            $timetableLine->setUser($this);
        }
        $__EXTRA__LINE;
        return $this;
    }

    public function removeTimetableLine(TimetableLine $timetableLine): self
    {
        if ($this->timetableLines->contains($timetableLine)) {
            $this->timetableLines->removeElement($timetableLine);
            // set the owning side to null (unless already changed)
            if ($timetableLine->getUser() === $this) {
                $timetableLine->setUser(null);
            }
        }
        $__EXTRA__LINE;
        return $this;
    }

    /**
     * @return Collection|ResourceClassification[]
     */
    public function getResourceClassifications(): Collection
    {
        return $this->resourceClassifications;
    }

    public function addResourceClassification(ResourceClassification $resourceClassification): self
    {
        if (!$this->resourceClassifications->contains($resourceClassification)) {
            $this->resourceClassifications[] = $resourceClassification;
            $resourceClassification->setUser($this);
        }

        return $this;
    }

    public function removeResourceClassification(ResourceClassification $resourceClassification): self
    {
        if ($this->resourceClassifications->contains($resourceClassification)) {
            $this->resourceClassifications->removeElement($resourceClassification);
            // set the owning side to null (unless already changed)
            if ($resourceClassification->getUser() === $this) {
                $resourceClassification->setUser(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection|Resource[]
     */
    public function getResources(): Collection
    {
        return $this->resources;
    }

    public function addResource(Resource $resource): self
    {
        if (!$this->resources->contains($resource)) {
            $this->resources[] = $resource;
            $resource->setUser($this);
        }
        return $this;
    }

    public function removeResource(Resource $resource): self
    {
        if ($this->resources->contains($resource)) {
            $this->resources->removeElement($resource);
            // set the owning side to null (unless already changed)
            if ($resource->getUser() === $this) {
                $resource->setUser(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection|Planification[]
     */
    public function getPlanifications(): Collection
    {
        return $this->planifications;
    }

    public function addPlanification(Planification $planification): self
    {
        if (!$this->planifications->contains($planification)) {
            $this->planifications[] = $planification;
            $planification->setUser($this);
        }
        return $this;
    }

    public function removePlanification(Planification $planification): self
    {
        if ($this->planifications->contains($planification)) {
            $this->planifications->removeElement($planification);
            // set the owning side to null (unless already changed)
            if ($planification->getUser() === $this) {
                $planification->setUser(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection|Label[]
     */
    public function getLabels(): Collection
    {
        return $this->labels;
    }

    public function addLabel(Label $label): self
    {
        if (!$this->labels->contains($label)) {
            $this->labels[] = $label;
            $label->setUser($this);
        }
        return $this;
    }

    public function removeLabel(Label $label): self
    {
        if ($this->labels->contains($label)) {
            $this->labels->removeElement($label);
            // set the owning side to null (unless already changed)
            if ($label->getUser() === $this) {
                $label->setUser(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection|PlanificationPeriod[]
     */
    public function getPlanificationPeriods(): Collection
    {
        return $this->planificationPeriods;
    }

    public function addPlanificationPeriod(PlanificationPeriod $planificationPeriod): self
    {
        if (!$this->planificationPeriods->contains($planificationPeriod)) {
            $this->planificationPeriods[] = $planificationPeriod;
            $planificationPeriod->setUser($this);
        }
        return $this;
    }

    public function removePlanificationPeriod(PlanificationPeriod $planificationPeriod): self
    {
        if ($this->planificationPeriods->contains($planificationPeriod)) {
            $this->planificationPeriods->removeElement($planificationPeriod);
            // set the owning side to null (unless already changed)
            if ($planificationPeriod->getUser() === $this) {
                $planificationPeriod->setUser(null);
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
            $planificationResource->setUser($this);
        }
        return $this;
    }

    public function removePlanificationResource(PlanificationResource $planificationResource): self
    {
        if ($this->planificationResources->contains($planificationResource)) {
            $this->planificationResources->removeElement($planificationResource);
            // set the owning side to null (unless already changed)
            if ($planificationResource->getUser() === $this) {
                $planificationResource->setUser(null);
            }
        }
        return $this;
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
            $planificationLine->setUser($this);
        }
        return $this;
    }

    public function removePlanificationLine(PlanificationLine $planificationLine): self
    {
        if ($this->planificationLines->contains($planificationLine)) {
            $this->planificationLines->removeElement($planificationLine);
            // set the owning side to null (unless already changed)
            if ($planificationLine->getUser() === $this) {
                $planificationLine->setUser(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection|Booking[]
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Booking $booking): self
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings[] = $booking;
            $booking->setUser($this);
        }
        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->bookings->contains($booking)) {
            $this->bookings->removeElement($booking);
            // set the owning side to null (unless already changed)
            if ($booking->getUser() === $this) {
                $booking->setUser(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection|BookingUser[]
     */
    public function getBookingUsers(): Collection
    {
        return $this->bookingUsers;
    }

    public function addBookingUser(BookingUser $bookingUser): self
    {
        if (!$this->bookingUsers->contains($bookingUser)) {
            $this->bookingUsers[] = $bookingUser;
            $bookingUser->setUser($this);
        }
        return $this;
    }

    public function removeBookingUser(BookingUser $bookingUser): self
    {
        if ($this->bookingUsers->contains($bookingUser)) {
            $this->bookingUsers->removeElement($bookingUser);
            // set the owning side to null (unless already changed)
            if ($bookingUser->getUser() === $this) {
                $bookingUser->setUser(null);
            }
        }
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
            $bookingLine->setUser($this);
        }
        return $this;
    }

    public function removeBookingLine(BookingLine $bookingLine): self
    {
        if ($this->bookingLines->contains($bookingLine)) {
            $this->bookingLines->removeElement($bookingLine);
            // set the owning side to null (unless already changed)
            if ($bookingLine->getUser() === $this) {
                $bookingLine->setUser(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection|BookingLabel[]
     */
    public function getBookingLabels(): Collection
    {
        return $this->bookingLabels;
    }

    public function addBookingLabel(BookingLabel $bookingLabel): self
    {
        if (!$this->bookingLabels->contains($bookingLabel)) {
            $this->bookingLabels[] = $bookingLabel;
            $bookingLabel->setUser($this);
        }
        return $this;
    }

    public function removeBookingLabel(BookingLabel $bookingLabel): self
    {
        if ($this->bookingLabels->contains($bookingLabel)) {
            $this->bookingLabels->removeElement($bookingLabel);
            // set the owning side to null (unless already changed)
            if ($bookingLabel->getUser() === $this) {
                $bookingLabel->setUser(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection|QueryBooking[]
     */
    public function getQueryBookings(): Collection
    {
        return $this->queryBookings;
    }

    public function addQueryBooking(QueryBooking $queryBooking): self
    {
        if (!$this->queryBookings->contains($queryBooking)) {
            $this->queryBookings[] = $queryBooking;
            $queryBooking->setUser($this);
        }
        return $this;
    }

    public function removeQueryBooking(QueryBooking $queryBooking): self
    {
        if ($this->queryBookings->contains($queryBooking)) {
            $this->queryBookings->removeElement($queryBooking);
            // set the owning side to null (unless already changed)
            if ($queryBooking->getUser() === $this) {
                $queryBooking->setUser(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection|FileParameter[]
     */
    public function getFileParameters(): Collection
    {
        return $this->fileParameters;
    }

    public function addFileParameter(FileParameter $fileParameter): self
    {
        if (!$this->fileParameters->contains($fileParameter)) {
            $this->fileParameters[] = $fileParameter;
            $fileParameter->setUser($this);
        }

        return $this;
    }

    public function removeFileParameter(FileParameter $fileParameter): self
    {
        if ($this->fileParameters->contains($fileParameter)) {
            $this->fileParameters->removeElement($fileParameter);
            // set the owning side to null (unless already changed)
            if ($fileParameter->getUser() === $this) {
                $fileParameter->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BookingDuplication[]
     */
    public function getBookingDuplications(): Collection
    {
        return $this->bookingDuplications;
    }

    public function addBookingDuplication(BookingDuplication $bookingDuplication): self
    {
        if (!$this->bookingDuplications->contains($bookingDuplication)) {
            $this->bookingDuplications[] = $bookingDuplication;
            $bookingDuplication->setUser($this);
        }

        return $this;
    }

    public function removeBookingDuplication(BookingDuplication $bookingDuplication): self
    {
        if ($this->bookingDuplications->contains($bookingDuplication)) {
            $this->bookingDuplications->removeElement($bookingDuplication);
            // set the owning side to null (unless already changed)
            if ($bookingDuplication->getUser() === $this) {
                $bookingDuplication->setUser(null);
            }
        }

        return $this;
    }
}
