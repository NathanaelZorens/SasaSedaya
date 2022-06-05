( function( api ) {
    
    api.sectionConstructor['the-words-pro'] = api.Section.extend( {
        
        attachEvents: function () {},
        
        isContextuallyActive: function () {
            return true;
        }
    } );
} )( wp.customize );