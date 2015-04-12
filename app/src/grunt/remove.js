/*
 * REMOVE: Remove directory and files
 */
module.exports = {
    /*
     * TARGET:  Remove unneeded direcories from downloaded CKEditor
     */
    prepareCkeditor: {
        dirList: [
            '<%= path.src.lib %>/ckeditor/adapters',
            '<%= path.src.lib %>/ckeditor/samples'
        ]
    },

    /*
     * TARGET:  Empties the tmp folder and removes it
     */
    cleanupTmp: {
        dirList: [
            '<%= path.tmp %>'
        ]
    },

    /*
     * TARGET:  Remove css source maps
     */
    soureMapCss: {
        fileList: [
            '<%= path.dest.css %>/bolt-old-ie.css.map',
            '<%= path.dest.css %>/bolt.css.map',
            '<%= path.dest.css %>/liveeditor.css.map'
        ]
    }
};
