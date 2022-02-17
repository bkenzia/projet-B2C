<?php

namespace App\Controller\Admin;

use App\Entity\Images;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Vich\UploaderBundle\Form\Type\VichImageType;


class ImagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Images::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('nom'),
            SlugField::new('Slug')->setTargetFieldName('nom'),
            TextEditorField::new('description'),
            TextField::new('imageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('image')->setBasePath('/uploads/images/realisations')->onlyOnIndex(),

            // TextField::new('image'),
            AssociationField::new('categorie'),
            AssociationField::new('Realisation'),
        ];
    }
}
