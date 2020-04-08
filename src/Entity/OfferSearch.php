<?php

namespace App\Entity;


class OfferSearch {

  const HABITAT = [
    1 => 'Appartement',
    2 => 'Maison'
  ];

  const TYPE = [
    1 => 'Location',
    2 => 'Vente'
  ];

  const HEAT = [
    1 => 'Electrique',
    2 => 'Gaz'
  ];

  /**
   * @var int | null
   */
  private $maxPrice;

  /**
   * @var int | null
   */
  private $minSurface;

  /**
   * @var int | null
   */
  private $minRooms;

  /**
   * @var int | null
   */
  private $minBedRooms;

  /**
   * @var int | null
   */
  private $type;

  /**
   * @var int | null
   */
  private $habitat;

  /**
   * @var int | null
   */
  private $heat;

  /**
   * @var string | null
   */
  private $city;


  /**
   * @return int|null
   */
  public function getMaxPrice(): ?int
  {
    return $this->maxPrice;
  }

  /**
   * @param int|null $maxPrice
   * @return OfferSearch
   */
  public function setMaxPrice(?int $maxPrice): OfferSearch
  {
    $this->maxPrice = $maxPrice;
    return $this;
  }

  /**
   * @return int|null
   */
  public function getMinSurface(): ?int
  {
    return $this->minSurface;
  }

  /**
   * @param int|null $minSurface
   * @return OfferSearch
   */
  public function setMinSurface(?int $minSurface): OfferSearch
  {
    $this->minSurface = $minSurface;
    return $this;
  }

  /**
   * @return int|null
   */
  public function getMinRooms(): ?int
  {
    return $this->minRooms;
  }

  /**
   * @param int|null $minRooms
   * @return OfferSearch
   */
  public function setMinRooms(?int $minRooms): OfferSearch
  {
    $this->minRooms = $minRooms;
    return $this;
  }

  /**
   * @return int|null
   */
  public function getMinBedRooms(): ?int
  {
    return $this->minBedRooms;
  }

  /**
   * @param int|null $minBedRooms
   * @return OfferSearch
   */
  public function setMinBedRooms(?int $minBedRooms): OfferSearch
  {
    $this->minBedRooms = $minBedRooms;
    return $this;
  }

  /**
   * @return int|null
   */
  public function getType(): ?int
  {
    return $this->type;
  }

  public function getTypeType(): string
  {
    return self::TYPE[$this->type];
  }

  /**
   * @param int|null $type
   * @return OfferSearch
   */
  public function setType(?int $type): OfferSearch
  {
    $this->type = $type;
    return $this;
  }

  /**
   * @return int|null
   */
  public function getHabitat(): ?int
  {
    return $this->habitat;
  }

  public function getHabitatType(): string
  {
    return self::HABITAT[$this->habitat];
  }

  /**
   * @param int|null $habitat
   * @return OfferSearch
   */
  public function setHabitat(?int $habitat): OfferSearch
  {
    $this->habitat = $habitat;
    return $this;
  }

  /**
   * @return string|null
   */
  public function getCity(): ?string
  {
    return $this->city;
  }

  /**
   * @param string|null $city
   * @return OfferSearch
   */
  public function setCity(?string $city): OfferSearch
  {
    $this->city = $city;
    return $this;
  }

  /**
   * @return int|null
   */
  public function getHeat(): ?int
  {
    return $this->heat;
  }

  public function getHeatType(): ?int
  {
    return self::HEAT[$this->type];
  }

  /**
   * @param int|null $heat
   * @return OfferSearch
   */
  public function setHeat(?int $heat): OfferSearch
  {
    $this->heat = $heat;
    return $this;
  }




}