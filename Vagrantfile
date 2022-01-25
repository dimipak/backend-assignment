# -*- mode: ruby -*-
# vi: set ft=ruby :

unless Vagrant.has_plugin?("vagrant-docker-compose")
  system("vagrant plugin install vagrant-docker-compose")
  puts "Dependencies installed."
  exit
end

unless Vagrant.has_plugin?("vagrant-vbguest")
  system("vagrant plugin install vagrant-vbguest")
  puts "Dependencies installed."
  exit
end

Vagrant.configure("2") do |config|

  config.vm.box = "bento/ubuntu-18.04"
  config.vm.box_check_update = false
  config.vagrant.plugins = ['vagrant-vbguest']
  config.vm.define :MarineTraffic do |box|
    box.vm.hostname = 'MarineTraffic'
    box.vm.network "private_network", ip: "192.168.5.10"

    box.vm.synced_folder ".", "/vagrant", mount_options: ["rw", "tcp", "nolock", "noacl", "async"], type: "nfs", nfs_udp: false

    box.vm.provider :virtualbox do |pr|
      pr.cpus = 2
      pr.memory = "4096"
      pr.customize ["setextradata", :id, "VBoxInternal2/SharedFoldersEnableSymlinksCreate/v-root", "1"]
      pr.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
    end

    box.vm.provision "shell", inline: "apt-get update"

    box.vm.provision "shell", path: "scripts/set_certificates.sh"

    box.vm.provision :docker
    box.vm.provision :docker_compose, yml: "/vagrant/docker-compose.yml", run: "always"

    box.vm.provision "shell", inline: "docker exec phpfpm bash -c \"cd /var/www && composer install\"", run: "always"

    box.vm.provision "shell", inline: "docker restart phpfpm"

#     box.vm.provision "shell", inline: "docker exec phpfpm php artisan migrate:refresh --seed"

#     box.vm.provision "shell", inline: "docker exec phpfpm php artisan migrate --env=testing"

  end

end