/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
CKEDITOR.config.contentsLangDirection = 'ltr';
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
        config.contentsLangDirection = 'ltr';
        config.extraPlugins = 'image';
        config.filebrowserUploadUrl = base_url+'/admin/ckeditor/upload?_token='+_token;
        
};
