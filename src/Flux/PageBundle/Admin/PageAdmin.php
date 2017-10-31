<?php

namespace Flux\PageBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Route\RouteCollection;

/**
 * Class PageAdmin.
 */
class PageAdmin extends AbstractAdmin
{
    protected $baseRoutePattern = 'page';
    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'ASC', // sort direction
        '_sort_by' => 'code', // field name
    );

    /**
     * @return array
     */
    public function getExportFormats()
    {
        return array('xls', 'csv');
    }

    /**
     * @param RouteCollection $collection
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('delete');
        $collection->remove('show');
        $collection->remove('batch');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);
        $listMapper
            ->addIdentifier('code', null, array('label' => $this->trans('page.code')))
            ->add('title', null, array('label' => $this->trans('page.title'), 'editable' => true))
            ->add(
                'image1',
                null,
                array(
                    'label' => $this->trans('page.image1'),
                    'template' => 'MainBundle:Admin:customimg1.html.twig',
                    'sortable' => false,
                )
            )
            ->add('position', null, array('label' => $this->trans('page.position'), 'editable' => true))
            ->add('is_active', 'boolean', array('label' => $this->trans('page.active'), 'editable' => true))
            // add custom action links
            ->add(
                '_action',
                'actions',
                array(
                    'actions' => array(
                        'edit' => array(),
                    ),
                    'label' => $this->trans('page.actions'),
                )
            );
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General', array('class' => 'col-md-6', 'box_class' => 'box box-success'))
            ->add('code', 'text', array('label' => $this->trans('page.code'), 'read_only' => true))
            ->add('title', 'text', array('label' => $this->trans('page.title')))
            ->add('summary', 'text', array('label' => $this->trans('page.summary'), 'required' => false))
            ->add('text1', 'ckeditor', array())
            ->end()
            ->with('SEO', array('class' => 'col-md-6', 'box_class' => 'box box-success')) // SEO
            ->add('metaTitle', 'text', array('label' => $this->trans('page.metatitle'), 'required' => false))
            ->add(
                'metaDescription',
                'text',
                array('label' => $this->trans('page.metadescription'), 'required' => false)
            )
            ->end()
            ->with('Imatges', array('class' => 'col-md-6', 'box_class' => 'box box-success')) // IMAGES
            ->add('image1File', 'file', array('label' => $this->trans('page.upload.image1'), 'required' => false))
            ->add(
                'image1',
                null,
                array('label' => $this->trans('page.image1'), 'required' => false, 'read_only' => true)
            )
            ->add('altImage1', 'text', array('label' => $this->trans('page.altimage1'), 'required' => false))
            ->add('titleImage1', 'text', array('label' => $this->trans('page.titleimage1'), 'required' => false))
            ->add('image2File', 'file', array('label' => $this->trans('page.upload.image2'), 'required' => false))
            ->add(
                'image2',
                null,
                array('label' => $this->trans('page.image2'), 'required' => false, 'read_only' => true)
            )
            ->add('altImage2', 'text', array('label' => $this->trans('page.altimage2'), 'required' => false))
            ->add('titleImage2', 'text', array('label' => $this->trans('page.titleimage2'), 'required' => false))
            ->add('image3File', 'file', array('label' => $this->trans('page.upload.image3'), 'required' => false))
            ->add(
                'image3',
                null,
                array('label' => $this->trans('page.image3'), 'required' => false, 'read_only' => true)
            )
            ->add('altImage3', 'text', array('label' => $this->trans('page.altimage3'), 'required' => false))
            ->add('titleImage3', 'text', array('label' => $this->trans('page.titleimage3'), 'required' => false))
            ->add('image4File', 'file', array('label' => $this->trans('page.upload.image4'), 'required' => false))
            ->add(
                'image4',
                null,
                array('label' => $this->trans('page.image4'), 'required' => false, 'read_only' => true)
            )
            ->add('altImage4', 'text', array('label' => $this->trans('page.altimage4'), 'required' => false))
            ->add('titleImage4', 'text', array('label' => $this->trans('page.titleimage4'), 'required' => false))
            ->end()
            ->with('Controls', array('class' => 'col-md-6', 'box_class' => 'box box-success')) // CONTROLS
            ->add('position', 'integer', array('label' => $this->trans('page.position')))
            ->add('is_active', 'checkbox', array('label' => $this->trans('page.active'), 'required' => false))
            ->end()
            ->with('Traduccions', array('class' => 'col-md-6', 'box_class' => 'box box-success')) // TRANSLATIONS
            ->add(
                'translations',
                'a2lix_translations_gedmo',
                array(
                    'label' => ' ',
                    'required' => false,
                    'translatable_class' => 'Flux\PageBundle\Entity\Page',
                    'fields' => array(
                        'title' => array('label' => $this->trans('page.title')),
                        'metaTitle' => array('label' => $this->trans('page.metatitle')),
                        'metaDescription' => array('label' => $this->trans('page.metadescription')),
                        'summary' => array('label' => $this->trans('page.summary')),
                        'text1' => array(
                            'label' => $this->trans('page.text1'),
                            'attr' => array(
                                'class' => 'ckeditor',
                                'style' => 'height:400px',
                            ),
                        ),
                        'altImage1' => array('label' => $this->trans('page.altimage1')),
                        'titleImage1' => array('label' => $this->trans('page.titleimage1')),
                        'altImage2' => array('label' => $this->trans('page.altimage2')),
                        'titleImage2' => array('label' => $this->trans('page.titleimage2')),
                        'altImage3' => array('label' => $this->trans('page.altimage3')),
                        'titleImage3' => array('label' => $this->trans('page.titleimage3')),
                        'altImage4' => array('label' => $this->trans('page.altimage4')),
                        'titleImage4' => array('label' => $this->trans('page.titleimage4')),
                    ),
                )
            );
    }
}
