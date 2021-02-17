const 
    path = require( 'path' ),
    MiniCssExtractPlugin = require( 'mini-css-extract-plugin' ),
    { CleanWebpackPlugin } = require( 'clean-webpack-plugin' ),
    OptimizeCssAssetsPlugin = require( 'optimize-css-assets-webpack-plugin' ),
    cssnano = require( 'cssnano' ), // https://cssnano.co/
    UglyfyJsWebpackPlugin = require( 'uglifyjs-webpack-plugin' ),
    DependencyExtractionWebpackPlugin = require( '@wordpress/dependency-extraction-webpack-plugin' ),
    GoogleFontsPlugin = require( '@beyonk/google-fonts-webpack-plugin' ),
    FileManagerPlugin = require( 'filemanager-webpack-plugin' );

const Assets = require( './config/webpack/assets' );

//  Rutas de archivos
const 
    JS = path .resolve( __dirname + '/assets/src/js' ),
    IMG = path .resolve( __dirname + '/assets/src/images' ),
    BUILD = path .resolve( __dirname + '/assets/build' );

//  Reglas
const rules = [
    {
        test: /\.js$/,
        include: [ JS ],
        exclude: /node_modules/,
        use: 'babel-loader'
    },
    {
		test: /\.(sa|sc|c)ss$/,
		exclude: /node_modules/,
		use: [
            //  Respalda al cargador de estilo en desarrollo
			MiniCssExtractPlugin.loader,
			'css-loader',
			'sass-loader',
		]
	},
    {
        test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
        use: {
            loader: 'file-loader',
            options: {
                name: 'images/[name].[ext]',        //  Elimina [path], este asume que la ruta del punto de entrada será la misma para la salida (por eso lo eliminamos)
                publicPath: 'production' === process .env .NODE_ENV ? '../' : '../../'
            }
        }
    },
    {
		test: /\.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
		exclude: [ IMG, /node_modules/ ],
		use: {
			loader: 'file-loader',
			options: {
				name: '[path][name].[ext]',
				publicPath: 'production' === process.env.NODE_ENV ? '../' : '../../'
			}
		}
	}
];

const allAssets = Assets .map( asset => {       //  Itera todos los assets que requieran ser copiados
    return {
        source: path .join( __dirname, `/node_modules/${ asset }` ),
        destination: path .join( __dirname, `/assets/src/css/` )
    }
});

console.log( allAssets );

//  Complementos - Nota: argv.mode devolverá 'development' o 'production'.
const plugins = ( argv ) => [
    new CleanWebpackPlugin( {
        cleanStaleWebpackAssets: ( 'production' === argv .mode  )    //  Elimina automáticamente todos los activos de paquete web no utilizados en la reconstrucción, cuando se establece en verdadero en producción. ( https://www.npmjs.com/package/clean-webpack-plugin#options-and-defaults-optional )
    } ), 
    new FileManagerPlugin({
        events: {
            onStart: {
                copy: allAssets
            }
        },
        runTasksInSeries: false,
    }),
    new MiniCssExtractPlugin( {
        filename: 'css/[name].css'
    } ),
    new DependencyExtractionWebpackPlugin({
        injectPolyfill: true,       //  Forza que wp-polyfill se incluya en la lista de dependencias de cada punto de entrada. Esto sería lo mismo que agregar la importación '@wordpress/polyfill'; a cada punto de entrada.
        combineAssets: true         //  Crea un archivo de activos para cada punto de entrada. Cuando esta marca se establece en verdadero, toda la información sobre los activos se combina en un solo archivo assets. (Json | php) generado en el directorio de salida (Ejecute: npm run prod & npm run dev)
    }),
    new GoogleFontsPlugin({
        fonts: [
            {   
                family: "Open Sans", 
                formats: [ "eot", "woff", "woff2", "ttf", "svg" ],
                variants: [ "400" ] 
            },
            {   
                family: "Raleway", 
                formats: [ "eot", "woff", "woff2", "ttf", "svg" ],
                variants: [ "400", "700", "900" ] 
            }
        ],
        path: 'fonts',
        filename: 'fonts/fonts.css'
    }),
];

module .exports = ( env, argv ) => ({
    entry: {
        main: JS + '/main.js',
        // single: JS + '/single.js',
        // archive: JS + '/archive.js',
        // editor: JS + '/editor.js',
        // blocks: JS + '/blocks.js'
    },
    output: {
        path: BUILD,
        filename: 'js/[name].js'
    },
    devtool: 'source-map',                  //  Genera mapas de origen
    module: {
        rules: rules
    },
    optimization: {
        minimizer: [                        //  Anula el minimizador predeterminado al proporcionar una o más instancias personalizadas diferentes
            new OptimizeCssAssetsPlugin( {  //  Complemento de Webpack para optimizar archivos CSS
                cssProcessor: cssnano       //  Formatea y minifica CSS
            } ),
            new UglyfyJsWebpackPlugin( {    //  Minimiza JavaScript.
                cache: false,               //  Desactiva el almacenamiento en caché de archivos (path: node_modules/.cache/uglifyjs-webpack-plugin).
                parallel: true,             //  Activa la ejecución en paralelo de múltiples procesos.
                sourceMap: false            //  Desactiva la generacion de mapas de origen de UglyfyJsWebpackPlugin
            } ) 
        ]
    },
    plugins: plugins( argv ),
    externals: {
        jquery: 'jQuery'
    }
});