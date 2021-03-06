<?php

use TYPO3\CMS\Core\Utility\VersionNumberUtility;

if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$tca = array(
    'ctrl' => array(
        'title'	=> 'LLL:EXT:pxa_cookie_bar/Resources/Private/Language/locallang_db.xlf:tx_pxacookiebar_domain_model_cookiewarning',
        'label' => 'uid',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => TRUE,

        'versioningWS' => 2,
        'versioning_followPages' => TRUE,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ),
        'searchFields' => 'warningmessage,linktext',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('pxa_cookie_bar') . 'Resources/Public/Icons/tx_pxacookiebar_domain_model_cookiewarning.gif'
    ),
    'interface' => array(
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, warningmessage, linktext, page',
    ),
    'types' => array(
        '1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, warningmessage, linktext, page,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
    ),
    'palettes' => array(
        '1' => array('showitem' => ''),
    ),
    'columns' => array(
        'sys_language_uid' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
            'config' => array(
                'type' => 'select',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => array(
                    array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
                    array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
                ),
            ),
        ),
        'l10n_parent' => array(
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
            'config' => array(
                'type' => 'select',
                'items' => array(
                    array('', 0),
                ),
                'foreign_table' => 'tx_pxacookiebar_domain_model_cookiewarning',
                'foreign_table_where' => 'AND tx_pxacookiebar_domain_model_cookiewarning.pid=###CURRENT_PID### AND tx_pxacookiebar_domain_model_cookiewarning.sys_language_uid IN (-1,0)',
            ),
        ),
        'l10n_diffsource' => array(
            'config' => array(
                'type' => 'passthrough',
            ),
        ),
        't3ver_label' => array(
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            )
        ),
        'hidden' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
            'config' => array(
                'type' => 'check',
            ),
        ),
        'starttime' => array(
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
            'config' => array(
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => array(
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ),
            ),
        ),
        'endtime' => array(
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
            'config' => array(
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => array(
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ),
            ),
        ),
        'warningmessage' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:pxa_cookie_bar/Resources/Private/Language/locallang_db.xlf:tx_pxacookiebar_domain_model_cookiewarning.warningmessage',
            'config' => array(
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'wizards' => array(
                    'RTE' => array(
                        'icon' => 'wizard_rte2.gif',
                        'notNewRecords' => 1,
                        'RTEonly' => 1,
                        'module' => array (
                            'name' => 'wizard_rte',
                        ),
                        'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
                        'type' => 'script'
                    )
                ),
            ),
            'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]',
        ),
        'linktext' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:pxa_cookie_bar/Resources/Private/Language/locallang_db.xlf:tx_pxacookiebar_domain_model_cookiewarning.linktext',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
        'page' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:pxa_cookie_bar/Resources/Private/Language/locallang_db.xlf:tx_pxacookiebar_domain_model_cookiewarning.page',
            'config' => array(
                'type' => 'input',
                'size' => 10,
                'eval' => 'trim,required',
                'wizards' => array(
                    '_PADDING' => 2,
                    'link' => array(
                        'type' => 'popup',
                        'title' => 'LLL:EXT:cms/locallang_ttc.xml:header_link_formlabel',
                        'icon' => 'link_popup.gif',
                        'module' => array(
                            'name' => 'wizard_link',
                        ),
                        'JSopenParams' => 'height=600,width=800,status=0,menubar=0,scrollbars=1',
                    ),
                ),
            )
        ),
    ),
);

// For 6.x compatibility
if( VersionNumberUtility::convertVersionNumberToInteger( VersionNumberUtility::getNumericTypo3Version()) < VersionNumberUtility::convertVersionNumberToInteger('7.0.0') ) {

    $tca['columns']['warningmessage']['config']['wizards']['RTE']['script'] = 'wizard_rte.php';
    unset( $tca['columns']['warningmessage']['config']['wizards']['RTE']['module'] );
    $tca['columns']['page']['config']['wizards']['link']['script'] = 'browse_links.php?mode=wizard';
    unset( $tca['columns']['page']['config']['wizards']['link']['module'] );

}

return $tca;