( function( api ) {

	// Extends our custom "classified-shop" section.
	api.sectionConstructor['classified-shop'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
