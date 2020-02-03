<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
/**
 * @ORM\Entity(repositoryClass="App\Repository\ExerciseRepository")
 * @ApiResource(
 *  collectionOperations={
 *         "get"={"method"="GET"}
 *     },
 *  itemOperations={
 *         "get"={"method"="GET"},
 *     },
 * )
 * @ApiFilter(SearchFilter::class, properties={"activite": "exact"})
 */
class Exercise
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $exerciseType;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $enonce;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $phraseTraduire;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $listeProposition = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reponseExercice;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $listeMotComorien = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $listeMotFrancais = [];

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Activite", inversedBy="exercises")
     */
    private $activite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExerciseType(): ?string
    {
        return $this->exerciseType;
    }

    public function setExerciseType(string $exerciseType): self
    {
        $this->exerciseType = $exerciseType;

        return $this;
    }

    public function getEnonce(): ?string
    {
        return $this->enonce;
    }

    public function setEnonce(string $enonce): self
    {
        $this->enonce = $enonce;

        return $this;
    }

    public function getPhraseTraduire(): ?string
    {
        return $this->phraseTraduire;
    }

    public function setPhraseTraduire(string $phraseTraduire): self
    {
        $this->phraseTraduire = $phraseTraduire;

        return $this;
    }

    public function getListeProposition(): ?array
    {
        return $this->listeProposition;
    }

    public function setListeProposition(array $listeProposition): self
    {
        $this->listeProposition = $listeProposition;

        return $this;
    }

    public function getReponseExercice(): ?string
    {
        return $this->reponseExercice;
    }

    public function setReponseExercice(string $reponseExercice): self
    {
        $this->reponseExercice = $reponseExercice;

        return $this;
    }

    public function getListeMotComorien(): ?array
    {
        return $this->listeMotComorien;
    }

    public function setListeMotComorien(array $listeMotComorien): self
    {
        $this->listeMotComorien = $listeMotComorien;

        return $this;
    }

    public function getListeMotFrancais(): ?array
    {
        return $this->listeMotFrancais;
    }

    public function setListeMotFrancais(array $listeMotFrancais): self
    {
        $this->listeMotFrancais = $listeMotFrancais;

        return $this;
    }

    public function getActivite(): ?Activite
    {
        return $this->activite;
    }

    public function setActivite(?Activite $activite): self
    {
        $this->activite = $activite;

        return $this;
    }
}
