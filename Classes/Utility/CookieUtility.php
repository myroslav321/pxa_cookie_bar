<?php

namespace Pixelant\PxaCookieBar\Utility;

use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class CookieUtility {

    /**
     * clear all cookies
     * @return void
     */
    public static function removeAllCookies() {
        $cookies = GeneralUtility::trimExplode(';', $_SERVER['HTTP_COOKIE'], TRUE);
        $host = GeneralUtility::getIndpEnv('TYPO3_HOST_ONLY');

        $domainParts = GeneralUtility::trimExplode('.', $host, TRUE);

        $subdomain = $domainParts[0] === 'www' ? substr($host, 3) : ('.' . $host);

        if(count($domainParts) > 2 && $domainParts[0] !== 'www') {
            $domainParts = array_reverse($domainParts);
            $jsDomain  = '.' . $domainParts[1] . '.' . $domainParts[0];
        }

        foreach($cookies as $cookie) {
            $parts = GeneralUtility::trimExplode('=', $cookie, TRUE);

            if($parts[0] !== 'be_typo_user') {
                setcookie($parts[0], '', time()-1000);
                setcookie($parts[0], '', time()-1000, '/');
                setcookie($parts[0], '', time()-1000, '/', $host);
                setcookie($parts[0], '', time()-1000, '/', $subdomain);
                if(!is_null($jsDomain)) {
                    setcookie($parts[0], '', time()-1000, '/', $jsDomain);
                }
            }
        }

        self::removeFEUserCookie($host, $subdomain);
    }

    /**
     * remove fe_user_cookie
     * @param string $host
     * @param string $subdomain
     * @return void
     */
    public static function removeFEUserCookie($host, $subdomain) {
        setcookie('fe_typo_user', '', time()-1000);
        setcookie('fe_typo_user', '', time()-1000, '/');
        setcookie('fe_typo_user', '', time()-1000, '/', $host);
        setcookie('fe_typo_user', '', time()-1000, '/', $subdomain);
    }

    /**
     * replace with subcdn domain
     *
     * @param $content
     * @return string
     */
    public function replaceWithSubDomain($content) {
        if(TYPO3_MODE === 'FE' && ($subDomain = self::getSubDomain())) {
            $content = str_replace(GeneralUtility::getIndpEnv('TYPO3_HOST_ONLY'), $subDomain, $content);
        }

        return $content;
    }

    /**
     * check if CDN is enabled and return domain
     *
     * @return string
     */
    static public function getSubDomain() {
        return self::getTSFE()->tmpl->setup['plugin.']['tx_pxacookiebar.']['settings.']['subDomain'] ? self::getTSFE()->tmpl->setup['plugin.']['tx_pxacookiebar.']['settings.']['subDomain'] : '';
    }

    /**
     * @return \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController
     */
    static public function getTSFE() {
        return $GLOBALS['TSFE'];
    }
}
