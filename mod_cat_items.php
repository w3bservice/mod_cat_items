<?php defined('_JEXEC') or die;
/*
 * @package     mod_cat_items
 * @copyright   Copyright (C) 2019 Aleksey A. Morozov (AlekVolsk). All rights reserved.
 * @license     GNU General Public License version 3 or later; see http://www.gnu.org/licenses/gpl-3.0.txt
 */

use Joomla\CMS\Helper\ModuleHelper;

require_once __DIR__ . '/helper.php';

$cacheparams = new \stdClass;
$cacheparams->cachemode = 'safeuri';
$cacheparams->class = 'ModCatItemsHelper';
$cacheparams->method = 'getList';
$cacheparams->methodparams = $params;
$cacheparams->modeparams = ['id' => 'int', 'Itemid' => 'int'];

$list = ModuleHelper::moduleCache($module, $params, $cacheparams);
if (!$list) {
    return;
}

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$showImage = $params->get('showImage', 0);
$showDate = $params->get('showDate', 0);

require ModuleHelper::getLayoutPath('mod_cat_items', $params->get('layout', 'default'));
