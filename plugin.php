<?php
/*
 * Plugin Name: Apermo Score Cards
 * Plugin URI:  https://github.com/apermo/apermo-score-cards
 * Description: Gutenberg blocks for card and board game score cards with automatic calculations.
 * Version:     1.0.0
 * Author:      Christoph Daum
 * Author URI:  https://apermo.de
 * License:     GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: apermo-score-cards
 * Domain Path: /languages
 * Requires at least: 6.5
 * Requires PHP: 8.3
 */

declare(strict_types=1);

namespace Apermo\ScoreCards;

\defined( 'ABSPATH' ) || exit();

\define( 'ASC_VERSION', '1.0.0' );
\define( 'ASC_PLUGIN_DIR', \plugin_dir_path( __FILE__ ) );
\define( 'ASC_PLUGIN_URL', \plugin_dir_url( __FILE__ ) );
\define( 'ASC_PLUGIN_BASENAME', \plugin_basename( __FILE__ ) );

if ( ! \file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	add_action(
		'admin_notices',
		// phpcs:ignore Universal.FunctionDeclarations.NoLongClosures.ExceedsMaximum
		static function (): void {
			wp_admin_notice(
				wp_kses(
					\sprintf(
						/* translators: %s: composer install command */
						__( 'Please run %s to install the required dependencies.', 'apermo-score-cards' ),
						'<code>composer install</code>',
					),
					[ 'code' => [] ],
				),
				[ 'type' => 'error' ],
			);
		},
	);
	return;
}

require_once __DIR__ . '/vendor/autoload.php';

Main::init( __FILE__ );
