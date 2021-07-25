<?php

/**
 * MultiWorld - PocketMine plugin that manages worlds.
 * Copyright (C) 2018 - 2021  CzechPMDevs
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

namespace czechpmdevs\multiworld\generator\normal\biome;

use czechpmdevs\multiworld\generator\normal\biome\types\Biome;
use czechpmdevs\multiworld\generator\normal\object\Tree;
use czechpmdevs\multiworld\generator\normal\populator\impl\PlantPopulator;
use czechpmdevs\multiworld\generator\normal\populator\impl\TreePopulator;
use czechpmdevs\multiworld\generator\normal\populator\object\Plant;
use pocketmine\block\VanillaBlocks;

class MushroomIsland extends Biome {

    public function __construct() {
        parent::__construct(0.9, 1);
        $this->setGroundCover([
            VanillaBlocks::MYCELIUM(),
            VanillaBlocks::DIRT(),
            VanillaBlocks::DIRT(),
            VanillaBlocks::DIRT(),
            VanillaBlocks::DIRT()
        ]);

        $mushrooms = new PlantPopulator(2, 2, 95);
        $mushrooms->addPlant(new Plant(VanillaBlocks::RED_MUSHROOM()));
        $mushrooms->addPlant(new Plant(VanillaBlocks::BROWN_MUSHROOM()));
        $mushrooms->allowBlockToStayAt(VanillaBlocks::MYCELIUM());

        $this->addPopulators([$mushrooms, new TreePopulator(1, 1, 100, Tree::MUSHROOM)]);

        $this->setElevation(64, 74);
    }

    public function getName(): string {
        return "Mushroom Island";
    }
}