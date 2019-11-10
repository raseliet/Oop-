<?php
namespace Core;
class View {
	
	protected $data;
	
	public function __construct($data) {
		$this->data = $data;
	}
	
	/**
	 * Renders array onto template
	 * @param string $template_path
	 * @return string HTML
	 * @throws Exception
	 */
	public function render(string $template_path) {
		// Check if template exists
		if (!file_exists($template_path)) {
			throw (new \Exception('Template with filename : ' . "$template_path does not exist!"));
		}
		
		// Pass arguments to the $template_path (*.tpl.php) as $data variable
		// as we require tpl file it's scoped to function's variables
		$data = $this->data;
	
		// Start buffering output to memory
		ob_start();
		// Load the view (template)
		require $template_path;
		return ob_get_clean();
	}
}
