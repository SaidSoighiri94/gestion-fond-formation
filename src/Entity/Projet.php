<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idProjet = null;

    #[ORM\Column(length: 35)]
    private ?string $nomProjet = null;

    #[ORM\Column(length: 50)]
    private ?string $listeDifusion = null;

    #[ORM\Column]
    private ?float $bugdetInitial = null;

    #[ORM\Column(nullable: true)]
    private ?int $seuilAlert = null;

    #[ORM\Column(nullable: true)]
    private ?float $budgetSecondaire = null;

    #[ORM\ManyToOne(inversedBy: 'projet')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $client = null;

    #[ORM\ManyToOne(inversedBy: 'projet')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $utilisateur = null;

    /**
     * @var Collection<int, AppelDeFond>
     */
    #[ORM\OneToMany(targetEntity: AppelDeFond::class, mappedBy: 'projet')]
    private Collection $appelDeFonds;

    public function __construct()
    {
        $this->appelDeFonds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProjet(): ?int
    {
        return $this->idProjet;
    }

    public function setIdProjet(int $idProjet): static
    {
        $this->idProjet = $idProjet;

        return $this;
    }

    public function getNomProjet(): ?string
    {
        return $this->nomProjet;
    }

    public function setNomProjet(string $nomProjet): static
    {
        $this->nomProjet = $nomProjet;

        return $this;
    }

    public function getListeDifusion(): ?string
    {
        return $this->listeDifusion;
    }

    public function setListeDifusion(string $listeDifusion): static
    {
        $this->listeDifusion = $listeDifusion;

        return $this;
    }

    public function getBugdetInitial(): ?float
    {
        return $this->bugdetInitial;
    }

    public function setBugdetInitial(float $bugdetInitial): static
    {
        $this->bugdetInitial = $bugdetInitial;

        return $this;
    }

    public function getSeuilAlert(): ?int
    {
        return $this->seuilAlert;
    }

    public function setSeuilAlert(?int $seuilAlert): static
    {
        $this->seuilAlert = $seuilAlert;

        return $this;
    }

    public function getBudgetSecondaire(): ?float
    {
        return $this->budgetSecondaire;
    }

    public function setBudgetSecondaire(?float $budgetSecondaire): static
    {
        $this->budgetSecondaire = $budgetSecondaire;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * @return Collection<int, AppelDeFond>
     */
    public function getAppelDeFonds(): Collection
    {
        return $this->appelDeFonds;
    }

    public function addAppelDeFond(AppelDeFond $appelDeFond): static
    {
        if (!$this->appelDeFonds->contains($appelDeFond)) {
            $this->appelDeFonds->add($appelDeFond);
            $appelDeFond->setProjet($this);
        }

        return $this;
    }

    public function removeAppelDeFond(AppelDeFond $appelDeFond): static
    {
        if ($this->appelDeFonds->removeElement($appelDeFond)) {
            // set the owning side to null (unless already changed)
            if ($appelDeFond->getProjet() === $this) {
                $appelDeFond->setProjet(null);
            }
        }

        return $this;
    }
}
