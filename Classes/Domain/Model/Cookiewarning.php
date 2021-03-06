<?php

namespace Pixelant\PxaCookieBar\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package pxa_cookie_bar
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Cookiewarning extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * warningmessage
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $warningmessage;

	/**
	 * linktext
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $linktext;

	/**
	 * page
	 *
	 * @var \string
	 */
	protected $page;

	/**
	 * Returns the warningmessage
	 *
	 * @return \string $warningmessage
	 */
	public function getWarningmessage() {
		return $this->warningmessage;
	}

	/**
	 * Sets the warningmessage
	 *
	 * @param \string $warningmessage
	 * @return void
	 */
	public function setWarningmessage($warningmessage) {
		$this->warningmessage = $warningmessage;
	}

	/**
	 * Returns the linktext
	 *
	 * @return \string $linktext
	 */
	public function getLinktext() {
		return $this->linktext;
	}

	/**
	 * Sets the linktext
	 *
	 * @param \string $linktext
	 * @return void
	 */
	public function setLinktext($linktext) {
		$this->linktext = $linktext;
	}

	/**
	 * Returns the page
	 *
	 * @return \string $page
	 */
	public function getPage() {
		return $this->page;
	}

	/**
	 * Sets the page
	 *
	 * @param \string $page
	 * @return void
	 */
	public function setPage($page) {
		$this->page = $page;
	}
}