/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.toolbarGroups = [
		{ name: 'basicstyles', groups: [ 'cleanup', 'basicstyles' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		'/',
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		'/',
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'Templates,Print,Preview,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,ShowBlocks,Maximize,About,Language,BidiRtl,BidiLtr,CreateDiv,Blockquote,Superscript,Subscript,NewPage,Save,Anchor,Replace,Find,SelectAll,Scayt,Outdent,Indent,Flash,HorizontalRule,PageBreak,Iframe';


    config.filebrowserBrowseUrl = ckfinder_config.base_url + '/' + ckfinder_config.html_path;

    config.filebrowserImageBrowseUrl = ckfinder_config.base_url + '/' + ckfinder_config.html_path + '?type=Images';

    config.filebrowserFlashBrowseUrl = ckfinder_config.base_url + '/' + ckfinder_config.html_path + '?type=Flash';

    config.filebrowserUploadUrl = ckfinder_config.base_url + '/' + ckfinder_config.connector_path + '?command=QuickUpload&type=Files';

    config.filebrowserImageUploadUrl = ckfinder_config.base_url + '/' + ckfinder_config.connector_path + '?command=QuickUpload&type=Images';

    config.filebrowserFlashUploadUrl = ckfinder_config.base_url + '/' + ckfinder_config.connector_path + '?command=QuickUpload&type=Flash';
};
