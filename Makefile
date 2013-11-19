dev:
	@grunt build --env=dev

prod:
	@grunt build --env=prod

watch:
	@grunt watch

install:
	@npm install
	@bower install