<?php 
namespace Flux\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as ACollection;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Flux\Utilities\Utils;

/**
 * @ORM\Entity
 * @ORM\Table(name="flux_activity")
 * @ORM\Entity(repositoryClass="Flux\ProductBundle\Repository\ActivityRepository")
 * @ORM\HasLifecycleCallbacks
 * @Gedmo\TranslationEntity(class="Flux\ProductBundle\Entity\Translation\ActivityTranslation")
 * @Vich\Uploadable
 */
class Activity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=10, unique=true)
     * @Assert\NotBlank()
     */
    protected $code;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Gedmo\Translatable
     */
    protected $metaTitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     */
    protected $metaDescription;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     * @Gedmo\Translatable
     */
    protected $title;

    /**
     * @ORM\Column(type="text", length=4000, nullable=true)
     * @Gedmo\Translatable
     */
    protected $description;

    /**
     * @ORM\Column(type="text", length=4000, nullable=true)
     * @Gedmo\Translatable
     */
    protected $conditions;

    /**
     * @Assert\File(
     *     maxSize="3M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"}
     * )
     * @Vich\UploadableField(mapping="activitats", fileNameProperty="image1")
     */
    protected $image1File;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $image1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     */
    protected $altImage1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Gedmo\Translatable
     */
    protected $titleImage1;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $startDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $endDate;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $isPermanent;

    /**
     * @ORM\Column(type="smallint")
     */
    protected $position;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isActive;

    /**
     * @ORM\ManyToOne(targetEntity="Flux\ProductBundle\Entity\ActivityCategory")
     */
    protected $category;

    /**
     * @Gedmo\Locale
     */
    private $locale;

    /**
     * @ORM\OneToMany(
     *  targetEntity="Flux\ProductBundle\Entity\Translation\ActivityTranslation",
     *  mappedBy="object",
     *  cascade={"persist", "remove"}
     * )
     * @Assert\Valid(deep = true)
     */
    private $translations;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created;

    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated;

    /**
     * Constructor
     */
    public function __construct() {
        $this->translations = new ACollection();
    }

    /**
     * Get translations
     *
     * @return ACollection
     */
    public function getTranslations() {
        return $this->translations;
    }

    /**
     * Add translation
     * @param EntityTranslation
     */
    public function addTranslation($translation) {
        if ($translation->getContent()) {
            $translation->setObject($this);
            $this->translations->add($translation);
        }
    }

    /**
     * Remove translation
     * @param EntityTranslation
     */
    public function removeTranslation($translation) {
        $this->translations->removeElement($translation);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
    }

    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;
    }

    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function titleSlug()
    {
        return Utils::getSlug($this->title);
    }

    public function setImage1($image1)
    {
        $this->image1 = $image1;
        $this->updated  = new \DateTime();
    }

    public function getImage1()
    {
        return $this->image1;
    }

    public function setImage1File($image1File)
    {
        $this->image1File = $image1File;
        $this->updated  = new \DateTime();
    }

    public function getImage1File()
    {
        return $this->image1File;
    }

    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }

    public function getIsActive()
    {
        return $this->isActive;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setAltImage1($altImage1)
    {
        $this->altImage1 = $altImage1;
    }

    public function getAltImage1()
    {
        return $this->altImage1;
    }

    public function setTitleImage1($titleImage1)
    {
        $this->titleImage1 = $titleImage1;
    }

    public function getTitleImage1()
    {
        return $this->titleImage1;
    }

    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    public function getLocale()
    {
        return $this->locale;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setConditions($conditions)
    {
        $this->conditions = $conditions;
    }

    public function getConditions()
    {
        return $this->conditions;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function setIsPermanent($isPermanent)
    {
        $this->isPermanent = $isPermanent;
    }

    public function getIsPermanent()
    {
        return $this->isPermanent;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function __toString()
    {
        return $this->getTitle()?:'---';
    }
}