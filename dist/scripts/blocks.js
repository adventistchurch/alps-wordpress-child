var allowedBlocks = [
    'core/paragraph',
    'core/image',
    'alps-gutenberg-blocks/image-2up',
];
 
wp.blocks.getBlockTypes().forEach( function( blockType ) {
    if ( allowedBlocks.indexOf( blockType.name ) === -1 ) {
        wp.blocks.unregisterBlockType( blockType.name );
    }
} );
