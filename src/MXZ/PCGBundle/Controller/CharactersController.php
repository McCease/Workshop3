<?php

namespace MXZ\PCGBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use MXZ\PCGBundle\Entity\Characters;
use MXZ\PCGBundle\Form\CharactersType;
use MXZ\PCGBundle\Form\addXPType;

/**
 * Characters controller.
 *
 */
class CharactersController extends Controller
{

    /**
     * Lists all Characters entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MXZPCGBundle:Characters')->findAll();

        return $this->render('MXZPCGBundle:Characters:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Characters entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Characters();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user = $this->container->get('security.context')->getToken()->getUser();
            $entity->setPlayer($user);
            $race=$entity->getRace();
            $entity->setSpecialAbilities($race->getTraits());
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('characters_gainlvl', array('id' => $entity->getId())));
        }

        return $this->render('MXZPCGBundle:Characters:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Characters entity.
     *
     * @param Characters $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Characters $entity)
    {
        $form = $this->createForm(new CharactersType(), $entity, array(
            'action' => $this->generateUrl('characters_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Characters entity.
     *
     */
    public function newAction()
    {
        $entity = new Characters();
        $form = $this->createCreateForm($entity);

        return $this->render('MXZPCGBundle:Characters:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Characters entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MXZPCGBundle:Characters')->find($id);
        $skills = $em->getRepository('MXZPCGBundle:Skills')->findAll();
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT * FROM workshop3.classes");
        $statement->execute();
        $classes = $statement->fetchAll();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Character entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MXZPCGBundle:Characters:show.html.twig', array(
            'skills' => $skills,
            'classes' => $classes,
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Characters entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MXZPCGBundle:Characters')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Characters entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('MXZPCGBundle:Characters:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Characters entity.
     *
     * @param Characters $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Characters $entity)
    {
        $form = $this->createForm(new CharactersType(), $entity, array(
            'action' => $this->generateUrl('characters_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Characters entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MXZPCGBundle:Characters')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Characters entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('characters_edit', array('id' => $id)));
        }

        return $this->render('MXZPCGBundle:Characters:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Characters entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MXZPCGBundle:Characters')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Characters entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('characters'));
    }

    /**
     * Creates a form to delete a Characters entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('characters_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }

    public function addxpAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MXZPCGBundle:Characters')->find($id);

        $addXPForm = $this->createAddXPForm($entity, $id);

        return $this->render('MXZPCGBundle:Characters:addxp.html.twig', array(
            'entity' => $entity,
            'addxp_form' => $addXPForm->createView(),
        ));
    }

    /**
     * Character is granted xp after session.
     *
     * @param Characters $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */

    private function createaddXPForm(Characters $entity, $id)
    {
        $form = $this->createForm(new addXPType(), $entity, array(
            'action' => $this->generateUrl('characters_updatexp', array('id' => $id)),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'addXP'));

        return $form;
    }

    public function updatexpAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MXZPCGBundle:Characters')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Characters entity.');
        }
        $addXPForm = $this->createaddXPForm(new Characters(), $id);
        $addXPForm->handleRequest($request);
        if ($addXPForm->isValid()) {
            $entity->addXP($addXPForm->getData()->getXP());
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('characters_gainlvl', array('id' => $id)));
        }

        return $this->render('MXZPCGBundle:Characters:show.html.twig', array(
            'entity' => $entity,

        ));
    }

    public function gainlvlAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $character = $em->getRepository('MXZPCGBundle:Characters')->find($id);
        $levels = $em->getRepository('MXZPCGBundle:XP')->findAll();

        $new_char_level = 0;
        $char_xp = $character->getXP();
        foreach ($levels as $level) {
            if ($level->getXP() > $char_xp) {
                $new_char_level = $level->getId() - 1;
                break;
            }
        }
        $total_levels = array_sum($character->getLevel());
        $unspent_as = 0;
        $unspent_feats = 0;
        for ($i = $total_levels + $character->getUnspentLevels(); $i < $new_char_level; $i++) {
            if ($levels[$i]->getFeats() == 1) {
                $unspent_feats += 1;
            }
            if ($levels[$i]->getAbilityScores() == 1) {
                $unspent_as += 1;
            }
        }
        $character->setUnspentFeats($character->getUnspentFeats() + $unspent_feats);
        $character->setUnspentAs($character->getUnspentAs() + $unspent_as);
        $character->setUnspentLevels($new_char_level - $total_levels);
        $em->persist($character);
        $em->flush();

        return $this->redirect($this->generateUrl('characters_show', array('id' => $id)));
    }

    public function gainclasslvlAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $character = $em->getRepository('MXZPCGBundle:Characters')->find($id);

        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT * FROM workshop3.classes");
        $statement->execute();
        $classes = $statement->fetchAll();
        $levels = $character->getLevel();

        $defaultData = $levels;
        $fb = $this->createFormBuilder($defaultData);
        $i = 0;
        foreach ($classes as $class) {
            $fb->add("$i", 'integer', array('label' => $class["name"], 'required' => false));
            $i++;
        }

        $fb->add('send', 'submit');
        $gainclass_form = $fb->getForm();
        $gainclass_form->handleRequest($request);


        if ($gainclass_form->isValid()) {
            $data = $gainclass_form->getData();
            $lvl = 0;
            $int_mod = $character->getINTe()->getModifier();
            $con_mod = $character->getCON()->getModifier();
            $uns_skill = 0;
            $hp = 0;


            foreach ($data as $key => $val) {
                if (isset($val)) {
                    if (isset($levels[$key])) {
                        $lvl += $val - $levels[$key];
                    } else {
                        $lvl += $val;
                    }
                    $levels[$key] = $val;

                    $tl = $character->getLvl();
                    if ($tl == 0) {
                        $hp += $classes[$key]["hp_dice"] + $con_mod;
                        for ($i = 0; $i < $val - 1; $i++) {
                            $hp += mt_rand(1, $classes[$key]["hp_dice"]) + $con_mod;
                        }
                    } else {
                        for ($i = 0; $i < $val; $i++) {
                            $temp = mt_rand(1, $classes[$key]["hp_dice"]) + $con_mod;
                            if ($temp <= 0) {
                                $hp += 1;
                            } else {
                                $hp += $temp;
                            }
                        }
                    }

                    if (($int_mod + $classes[$key]["skill_points"]) <= 0) {
                        $uns_skill += $val;
                    } else {
                        $uns_skill += $val * ($int_mod + $classes[$key]["skill_points"]);
                    }
                }
            }
            $character->setLvl($lvl+$tl);
            $character->setHP($character->getHP() + $hp);
            $character->setUnspentLevels($character->getUnspentLevels() - $lvl);
            $character->setUnspentSkills($character->getUnspentSkills() + $uns_skill);
            $character->setLevel($levels);
            $em->flush();

            return $this->redirect($this->generateUrl('characters_show', array('id' => $id)));
        }

        return $this->render('MXZPCGBundle:Characters:gainclass.html.twig', array(
            'entity' => $character,
            'form' => $gainclass_form->createView(),
        ));
    }


    public function gainskillsAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $character = $em->getRepository('MXZPCGBundle:Characters')->find($id);

        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT * FROM workshop3.skills");
        $statement->execute();
        $skills = $statement->fetchAll();
        $char_skills = $character->getSkills();

        $defaultData = $char_skills;
        $fb = $this->createFormBuilder($defaultData);
        $i = 0;
        foreach ($skills as $skill) {
            $fb->add("$i", 'integer', array('label' => $skill["skill"], 'required' => false));
            $i++;
        }

        $fb->add('send', 'submit');
        $form = $fb->getForm();
        $form->handleRequest($request);


        if ($form->isValid()) {
            $data = $form->getData();
            $spent_skill=0;
            foreach ($data as $key => $val) {
                $spent_skill+=$val-$char_skills[$key];
                $char_skills[$key]=$val;
            }
            $character->setUnspentSkills($character->getUnspentSkills() - $spent_skill);
            $character->setSkills($char_skills);
            $em->flush();

            return $this->redirect($this->generateUrl('characters_show', array('id' => $id)));
        }

        return $this->render('MXZPCGBundle:Characters:gainclass.html.twig', array(
            'entity' => $character,
            'form' => $form->createView(),
        ));
    }

}
