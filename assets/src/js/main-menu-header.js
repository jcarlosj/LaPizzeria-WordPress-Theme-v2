const 
    menuIcon = document .querySelector( '#menu-icon' ),
    menuHeader = document .querySelector( '.menu-header' );

let displayMenu = false;

const medium = 768;

menuIcon .addEventListener( 'click', () => {
    displayMenu = ! displayMenu;
    if( displayMenu ) {
        menuIcon .classList .add( 'change-icon' );   
        menuHeader .classList .remove( 'not-display' ); 
    }
    else {
        menuIcon .classList .remove( 'change-icon' );
        menuHeader .classList .add( 'not-display' ); 
    }
    
    console.log( `Display menu ${ ! displayMenu }` );
});

console .log( 'Main Header' );