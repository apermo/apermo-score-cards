<?php

declare(strict_types=1);

namespace Apermo\ScoreCards;

use Apermo\ScoreCards\Admin\DeactivationFlow;

/**
 * Bootstraps the plugin.
 */
class Main {

	public const VERSION = '1.0.0';

	/**
	 * Holds the main plugin file path.
	 *
	 * @var string
	 */
	private static string $file = '';

	/**
	 * Initializes the plugin.
	 *
	 * @param string $file Main plugin file path.
	 *
	 * @return void
	 */
	public static function init( string $file ): void {
		self::$file = $file;

		register_activation_hook( $file, [ self::class, 'activate' ] );
		register_deactivation_hook( $file, [ self::class, 'deactivate' ] );
		add_action( 'plugins_loaded', [ self::class, 'boot' ] );
	}

	/**
	 * Returns the main plugin file path.
	 *
	 * @return string
	 */
	public static function file(): string {
		return self::$file;
	}

	/**
	 * Activates the plugin.
	 *
	 * @return void
	 */
	public static function activate(): void {
		Capabilities::register();
		flush_rewrite_rules();
	}

	/**
	 * Deactivates the plugin.
	 *
	 * @return void
	 */
	public static function deactivate(): void {
		Capabilities::unregister();
		flush_rewrite_rules();
	}

	/**
	 * Boots the plugin after all plugins are loaded.
	 *
	 * @return void
	 */
	public static function boot(): void {
		load_plugin_textdomain(
			'apermo-score-cards',
			false,
			dirname( ASC_PLUGIN_BASENAME ) . '/languages'
		);

		Capabilities::init();
		Players::init();
		Games::init();
		REST_API::init();
		Block_Bindings::init();
		Blocks::init();

		if ( is_admin() ) {
			( new DeactivationFlow() )->register();
		}
	}
}
