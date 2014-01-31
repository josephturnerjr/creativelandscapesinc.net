SITE_ROOT = creative
OUTPUT_DIR = ./.site/

build: clean js css site
	
clean:
	make -C $(SITE_ROOT)/static/js clean
	make -C $(SITE_ROOT)/static/css clean

js:
	make -C $(SITE_ROOT)/static/js 
	
css:
	make -C $(SITE_ROOT)/static/css

site:
	jekyll build -s $(SITE_ROOT) -d $(OUTPUT_DIR)

dummy:

.PHONY: env dummy blog blog clean
