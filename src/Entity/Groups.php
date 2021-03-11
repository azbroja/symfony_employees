<?php

namespace App\Entity;

use App\Repository\GroupsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupsRepository::class)
 */
class Groups
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Employees::class, mappedBy="groups")
     */
    private $employees;

    /**
     * @ORM\ManyToOne(targetEntity=Groups::class, inversedBy="groups")
     */
    private $groups;


    public function __construct()
    {
        $this->employees = new ArrayCollection();
        $this->groupParents = new ArrayCollection();
        $this->groups = new ArrayCollection();
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
     * @return Collection|Employees[]
     */
    public function getEmployees(): Collection
    {
        return $this->employees;
    }

    public function addEmployee(Employees $employee): self
    {
        if (!$this->employees->contains($employee)) {
            $this->employees[] = $employee;
            $employee->addGroup($this);
        }

        return $this;
    }

    public function removeEmployee(Employees $employee): self
    {
        if ($this->employees->removeElement($employee)) {
            $employee->removeGroup($this);
        }

        return $this;
    }

    /**
     * @return Collection|GroupParent[]
     */
    public function getGroupParents(): Collection
    {
        return $this->groupParents;
    }

    public function addGroupParent(GroupParent $groupParent): self
    {
        if (!$this->groupParents->contains($groupParent)) {
            $this->groupParents[] = $groupParent;
            $groupParent->setGroups($this);
        }

        return $this;
    }

    public function removeGroupParent(GroupParent $groupParent): self
    {
        if ($this->groupParents->removeElement($groupParent)) {
            // set the owning side to null (unless already changed)
            if ($groupParent->getGroups() === $this) {
                $groupParent->setGroups(null);
            }
        }

        return $this;
    }

    public function getGroups(): ?self
    {
        return $this->groups;
    }

    public function setGroups(?self $groups): self
    {
        $this->groups = $groups;

        return $this;
    }

    public function addGroup(self $group): self
    {
        if (!$this->groups->contains($group)) {
            $this->groups[] = $group;
            $group->setGroups($this);
        }

        return $this;
    }

    public function removeGroup(self $group): self
    {
        if ($this->groups->removeElement($group)) {
            // set the owning side to null (unless already changed)
            if ($group->getGroups() === $this) {
                $group->setGroups(null);
            }
        }

        return $this;
    }
}
