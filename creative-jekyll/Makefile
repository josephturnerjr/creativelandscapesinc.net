run: 
	tmux new-session -d -s cl 'jekyll serve --watch'
	tmux splitw -h -t cl 'cd css; ~/bin/lesswatch'
	tmux attach

dummy:

.PHONY: env dummy dashboard blog landscape
