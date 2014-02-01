SITE_ROOT = creative
OUTPUT_DIR = ./.site/

build: clean js css site
	
clean:
	make -C $(SITE_ROOT)/js clean
	make -C $(SITE_ROOT)/css clean

js:
	make -C $(SITE_ROOT)/js 
	
css:
	make -C $(SITE_ROOT)/css

site:
	jekyll build -s $(SITE_ROOT) -d $(OUTPUT_DIR)

dummy:

.PHONY: env dummy blog blog clean
