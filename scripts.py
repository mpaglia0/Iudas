import sys
import subprocess
import shutil
import os

def generate_package():
    try:
        subprocess.run([
            "iudas-generator-cli",
            "generate",
            "-g",
            "python",
            "--library",
            "urllib3",
            "-t",
            "lib_template",
            "-o",
            "src",
            "-i",
            "iudas.yaml",
            "-c",
            "config.json"
        ])
    except Exception as e:
        print("Exception when generating package: %s\n" % e)


def build_distro_package():
    try:
        os.chdir("src/")
        # Check if the 'dist/' folder exists
        if os.path.exists("dist"):
            # If it exists, delete it and its contents
            shutil.rmtree("dist")

        # Upgrade the 'build' module
        subprocess.run([
            "python3",
            "-m",
            "pip",
            "install",
            "--upgrade",
            "build"
        ])

        # Generate a new 'dist/' folder  
        subprocess.run([
            "python3",
            "-m",
            "build"
        ])  
    except Exception as e:
        print("Exception when building distro package: %s\n" % e)       


if __name__ == "__main__":
    if len(sys.argv) != 2:
        print("Usage: python3 scripts.py [generate_package | build_distro_package]")
        sys.exit(1)
    
    script_to_run = sys.argv[1]
    if script_to_run == "generate_package":
        generate_package()
    elif script_to_run == "build_distro_package":
        build_distro_package()
    else:
        print("Invalid script name. Use one of: generate_package, build_distro_package")
        sys.exit(1) 
